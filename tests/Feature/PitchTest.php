<?php

namespace Tests\Feature;

use Tests\TestCase;

class PitchTest extends TestCase
{
    public function test_pitch_renders_and_projection_reconciles()
    {
        $response = $this->get('/pitch');
        $response->assertOk()->assertViewIs('pitch')
            ->assertSee('สมมติฐาน')->assertSee('36.41')->assertSee('Partner')
            ->assertSee('MintCollect')->assertSee('MintApprove')->assertSee('logo-alexia.png')
            ->assertSee('MintERP เป็นแกนหลัก')->assertSee('บริหารหลังบ้านทั้งองค์กร')
            ->assertSee('ขายหน้าร้าน เห็นยอดชัดเจน')->assertDontSee('MintPOS + Services');

        $a = $response->viewData('assumptions');
        $scenarios = $response->viewData('scenarios');
        $years = $response->viewData('years');
        $this->assertCount(5, $years);
        $this->assertEqualsWithDelta(1800000, $years[0]['companyRevenue'], 0.01);
        $this->assertEqualsWithDelta(-576000, $years[0]['operatingResult'], 0.01);
        $this->assertNull($years[0]['growth']);
        $this->assertEqualsWithDelta(226, $years[1]['growth'], 0.001);
        $this->assertEqualsWithDelta(986.946, $years[4]['active'], 0.001);
        $this->assertEqualsWithDelta(36411732, $years[4]['companyRevenue'], 0.01);
        $this->assertEqualsWithDelta(180000, $response->viewData('partnerYears')[0]['partnerRevenue'], 0.01);
        $this->assertEqualsWithDelta(60000, $a['annualPrice'], 0.01);
        $this->assertEqualsWithDelta(39000, $a['annualPrice'] * $a['partnerSubscriptionShare'] + $a['setupPrice'] * $a['partnerSetupShare'], 0.01);

        $roadmap = $response->viewData('roadmap');
        $this->assertCount(2, $roadmap);
        $this->assertEqualsWithDelta(11900, $roadmap[0]['companyFirstYear'], 0.01);
        $this->assertEqualsWithDelta(8100, $roadmap[1]['companyFirstYear'], 0.01);
        $this->assertEqualsWithDelta(6830, $roadmap[0]['annualContribution'], 0.01);
        $this->assertEqualsWithDelta(4530, $roadmap[1]['annualContribution'], 0.01);
        foreach ($roadmap as $product) {
            $this->assertEqualsWithDelta($product['annual'] + $product['setup'], $product['partnerAnnual'] + $product['partnerSetup'] + $product['companyFirstYear'], 0.01);
        }

        foreach ($scenarios as $scenario) {
            $previous = 0;
            foreach ($scenario['years'] as $row) {
                $this->assertEqualsWithDelta($previous * $scenario['retention'] + $row['new'], $row['active'], 0.001);
                $this->assertEqualsWithDelta(($row['retained'] + $row['new'] / 2) * $a['annualPrice'], $row['subscription'], 0.01);
                $this->assertEqualsWithDelta($row['subscription'] + $row['setup'], $row['companyRevenue'] + $row['partnerRevenue'], 0.01);
                $this->assertEqualsWithDelta($row['subscription'] * 0.12 + $row['setup'] * 0.20, $row['variableCost'], 0.01);
                $this->assertEqualsWithDelta($row['companyRevenue'] - $row['variableCost'] - $row['opex'], $row['operatingResult'], 0.01);
                $this->assertEqualsWithDelta($row['active'] * 42000, $row['netArr'], 0.01);
                $previous = $row['active'];
            }
            $this->assertEqualsWithDelta($scenario['years'][4]['companyRevenue'], $scenario['years'][0]['companyRevenue'] * pow(1 + $scenario['cagr'] / 100, 4), 0.01);
        }
        foreach ($response->viewData('totals') as $field => $total) {
            $this->assertEqualsWithDelta(array_sum(array_column($years, $field)), $total, 0.01);
        }
    }
}
