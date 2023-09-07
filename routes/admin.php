<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EnquiryController;




Route::get('/test', function () {
    echo "Abhiram";
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin-login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('admin-login-post');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::get('/logout', [Admincontroller::class, 'adminLogout'])->name('admin-logout');
        Route::get('/profile', [Admincontroller::class, 'adminProfile'])->name('admin-profile');
        Route::get('/profile/edit', [Admincontroller::class, 'adminProfileEdit'])->name('admin-profile-edit');
        Route::post('/profile/update', [AdminController::class, 'adminProfileUpdate'])->name('admin-profile-update');
        Route::get('/change/password', [Admincontroller::class, 'changePassword'])->name('admin-change-password');
        Route::post('/update/password', [AdminController::class, 'updatePassword'])->name('admin-password-update');


        Route::get('/enquiry', [EnquiryController::class, 'index'])->name('user-enquiry');
        Route::get('/enquiry/{id}', [EnquiryController::class, 'delete'])->name('user-enquiry-delete');

    });

});
