<?php

use App\Http\Controllers\RealStateAgent\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'real-estate-agent', 'as' => 'real-estate-agent.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});