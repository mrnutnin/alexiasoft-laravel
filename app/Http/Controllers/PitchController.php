<?php

namespace App\Http\Controllers;

class PitchController extends Controller
{
    public function index()
    {
        // Planning assumptions only; these are not current prices or historical results.
        $assumptions = [
            'annualPrice' => 60000,
            'setupPrice' => 30000,
            'partnerSubscriptionShare' => 0.30,
            'partnerSetupShare' => 0.70,
            'subscriptionCostRate' => 0.12,
            'setupCostRate' => 0.20,
            'opex' => [1800000, 2400000, 3300000, 4500000, 6000000],
        ];
        $scenarios = [];
        foreach ([
            'conservative' => ['label' => 'Conservative', 'partners' => [6, 12, 20, 30, 40], 'deals' => 4, 'retention' => 0.85],
            'base' => ['label' => 'Base case', 'partners' => [10, 20, 35, 50, 70], 'deals' => 6, 'retention' => 0.90],
            'upside' => ['label' => 'Upside', 'partners' => [12, 25, 45, 70, 100], 'deals' => 8, 'retention' => 0.95],
        ] as $key => $scenario) {
            $scenario['years'] = $this->project($assumptions, $scenario['partners'], $scenario['deals'], $scenario['retention']);
            $scenario['cagr'] = (pow($scenario['years'][4]['companyRevenue'] / $scenario['years'][0]['companyRevenue'], 1 / 4) - 1) * 100;
            $scenarios[$key] = $scenario;
        }

        $years = $scenarios['base']['years'];
        $partnerYears = $this->project($assumptions, [1, 1, 1, 1, 1], 6, 0.90);
        $totals = [];
        foreach (['customerSpend', 'companyRevenue', 'partnerRevenue', 'contribution', 'operatingResult'] as $field) {
            $totals[$field] = array_sum(array_column($years, $field));
        }

        // Proposed future products; kept outside the MintERP five-year forecast.
        $roadmap = [
            ['name' => 'MintCollect', 'monthly' => 1490, 'annual' => 14900, 'setup' => 4900, 'monthlyCost' => 300],
            ['name' => 'MintApprove', 'monthly' => 990, 'annual' => 9900, 'setup' => 3900, 'monthlyCost' => 200],
        ];
        foreach ($roadmap as &$product) {
            $product['partnerAnnual'] = $product['annual'] * $assumptions['partnerSubscriptionShare'];
            $product['partnerSetup'] = $product['setup'] * $assumptions['partnerSetupShare'];
            $product['companyFirstYear'] = $product['annual'] + $product['setup'] - $product['partnerAnnual'] - $product['partnerSetup'];
            $product['annualContribution'] = $product['annual'] - $product['partnerAnnual'] - $product['monthlyCost'] * 12;
        }
        unset($product);

        return view('pitch', compact('assumptions', 'scenarios', 'years', 'partnerYears', 'totals', 'roadmap'));
    }

    private function project(array $a, array $partners, int $deals, float $retention): array
    {
        $rows = [];
        $active = 0;
        $previousRevenue = null;
        foreach ($partners as $index => $count) {
            $new = $count * $deals;
            // ponytail: annual cohort model; use monthly cohorts for actual billing/cash-flow forecasts.
            $retained = $active * $retention;
            $average = $retained + $new / 2; // New sales spread evenly across the year.
            $active = $retained + $new;
            $subscription = $average * $a['annualPrice'];
            $setup = $new * $a['setupPrice'];
            $partnerRevenue = $subscription * $a['partnerSubscriptionShare'] + $setup * $a['partnerSetupShare'];
            $companyRevenue = $subscription + $setup - $partnerRevenue;
            $variableCost = $subscription * $a['subscriptionCostRate'] + $setup * $a['setupCostRate'];
            $contribution = $companyRevenue - $variableCost;
            $rows[] = [
                'year' => $index + 1, 'partners' => $count, 'new' => $new,
                'retained' => $retained, 'active' => $active, 'average' => $average,
                'subscription' => $subscription, 'setup' => $setup,
                'customerSpend' => $subscription + $setup,
                'partnerRevenue' => $partnerRevenue, 'companyRevenue' => $companyRevenue,
                'netArr' => $active * $a['annualPrice'] * (1 - $a['partnerSubscriptionShare']),
                'variableCost' => $variableCost, 'contribution' => $contribution,
                'opex' => $a['opex'][$index], 'operatingResult' => $contribution - $a['opex'][$index],
                'growth' => $previousRevenue === null ? null : ($companyRevenue / $previousRevenue - 1) * 100,
            ];
            $previousRevenue = $companyRevenue;
        }
        return $rows;
    }
}
