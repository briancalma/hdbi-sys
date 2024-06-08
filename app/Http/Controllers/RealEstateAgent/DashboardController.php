<?php

namespace App\Http\Controllers\RealEstateAgent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('real-estate-agent.dashboard');
    }
}
