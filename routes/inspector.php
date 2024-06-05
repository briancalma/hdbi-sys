<?php

use App\Http\Controllers\Inspector\DashboardController;
use App\Http\Controllers\Inspector\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'inspector', 'as' => 'inspector.'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
});