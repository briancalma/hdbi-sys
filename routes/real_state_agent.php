<?php

use App\Http\Controllers\RealStateAgent\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'real-state-agent', 'as' => 'real-state-agent.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});