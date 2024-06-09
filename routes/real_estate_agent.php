<?php

use App\Constants\Roles;
use App\Http\Controllers\RealEstateAgent\DashboardController;
use App\Http\Controllers\RealEstateAgent\ReportOrderController;
use Illuminate\Support\Facades\Route;

$middlewares = [
    'role:'. Roles::REAL_ESTATE_AGENT,
];

Route::group(['prefix' => 'real-estate-agent', 'as' => 'real-estate-agent.', 'middleware' => $middlewares], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route::get('report-orders/create', [ReportOrderController::class, 'create'])->name('report-orders.create');
    Route::get('report-orders/create/step-1', [ReportOrderController::class, 'showStep1'])->name('report-orders.create.step-1');
    Route::post('report-orders/create/step-1', [ReportOrderController::class, 'storeStep1'])->name('report-orders.store.step-1');

    Route::get('report-orders/create/step-2', [ReportOrderController::class, 'showStep2'])->name('report-orders.create.step-2');
    Route::post('report-orders/create/step-2', [ReportOrderController::class, 'storeStep2'])->name('report-orders.store.step-2');

    Route::get('report-orders/create/step-3', [ReportOrderController::class, 'showStep3'])->name('report-orders.create.step-3');
    Route::get('report-orders/create/order-summary', [ReportOrderController::class, 'showOrderSummary'])->name('report-orders.create.order-summary');
    Route::get('report-orders/create/payment', [ReportOrderController::class, 'showPaymentForm'])->name('report-orders.create.payment-form');

});