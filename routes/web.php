<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment', [PaymentController::class, 'showPaymentForm']);
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');


