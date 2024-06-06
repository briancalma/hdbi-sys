<?php

use App\Http\Controllers\Root\ConfigurationController;
use App\Http\Controllers\Root\DashboardController;
use App\Http\Controllers\Root\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'root', 'as' => 'root.'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    
    // Configurations
    Route::resource('configurations', ConfigurationController::class);
});