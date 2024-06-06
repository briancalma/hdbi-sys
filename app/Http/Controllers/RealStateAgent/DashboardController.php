<?php

namespace App\Http\Controllers\RealStateAgent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('real-state-agent.dashboard');
    }
}
