<?php

use App\Constants\Roles;
use App\Http\Controllers\Root\ConfigurationController;
use App\Http\Controllers\Root\DashboardController;
use App\Http\Controllers\Root\UserController;
use Illuminate\Support\Facades\Route;

$middlewares = [
    'role:' . Roles::ROOT
];

Route::group(['prefix' => 'root', 'as' => 'root.', 'middleware' => $middlewares], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    
    // Configurations
    Route::resource('configurations', ConfigurationController::class);
});