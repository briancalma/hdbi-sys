<?php

use App\Constants\Roles;
use App\Http\Controllers\RealStateAgent\DashboardController;
use Illuminate\Support\Facades\Route;

$middlewares = [
    'role:'. Roles::REAL_ESTATE_AGENT,
];

Route::group(['prefix' => 'real-estate-agent', 'as' => 'real-estate-agent.', 'middleware' => $middlewares], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});