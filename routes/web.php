<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'index'])->name('home');
Route::post('enquiry', [HomeController::class, 'enquiry'])->name('enquery-store');
