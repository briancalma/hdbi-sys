<?php

use App\Constants\Roles;
use App\Http\Controllers\Inspector\DashboardController;
use App\Http\Controllers\Inspector\UserController;
use Illuminate\Support\Facades\Route;


$middlewares = [
    'role:' . Roles::INSPECTOR
];

Route::group(['prefix' => 'inspector', 'as' => 'inspector.', 'middleware' => $middlewares], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
});