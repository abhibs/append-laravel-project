<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'index'])->name('home');
Route::post('enquiry', [HomeController::class, 'enquiry'])->name('enquery-store');
Route::post('contact', [HomeController::class, 'contact'])->name('contact-store');
Route::get('package/booking/{id}', [PaymentController::class, 'packageBooking'])->name('package-booking');
Route::get('invoice/download/{id}', [PaymentController::class, 'invoiceDownload'])->name('invoice-download');


Route::post('submit', [PaymentController::class, 'submit_payment'])->name('instamojo-payment');
Route::get('redirect', [PaymentController::class, 'redirect']);