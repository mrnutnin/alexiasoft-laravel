<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index()
    {
        return redirect('/#portfolio');
    }
}
