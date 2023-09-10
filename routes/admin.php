<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\AboutUsController;
use Symfony\Component\HttpKernel\Profiler\Profile;


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


        Route::get('/client/create', [ClientController::class, 'create'])->name('client-create');
        Route::post('/client/store', [ClientController::class, 'store'])->name('client-store');
        Route::get('/client', [ClientController::class, 'index'])->name('client');
        Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client-edit');
        Route::post('/client/update', [ClientController::class, 'update'])->name('client-update');
        Route::get('/client/delete/{id}', [ClientController::class, 'delete'])->name('client-delete');
        Route::get('/client/inactive/{id}', [ClientController::class, 'inactive'])->name('client-inactive');
        Route::get('/client/active/{id}', [ClientController::class, 'active'])->name('client-active');

        Route::get('/about/us/content/create', [AboutController::class, 'create'])->name('about-create');
        Route::post('/about/us/content/store', [AboutController::class, 'store'])->name('about-store');
        Route::get('/about/us/content', [AboutController::class, 'index'])->name('about');
        Route::post('/about/us/content/update', [AboutController::class, 'update'])->name('about-update');


        Route::get('/about/us/features/create', [AboutUsController::class, 'create'])->name('aboutus-create');
        Route::post('/about/us/features/store', [AboutUsController::class, 'store'])->name('aboutus-store');
        Route::get('/about/us/features', [AboutUsController::class, 'index'])->name('aboutus');
        Route::get('/about/us/features/edit/{id}', [AboutUsController::class, 'edit'])->name('aboutus-edit');
        Route::post('/about/us/features/update', [AboutUsController::class, 'update'])->name('aboutus-update');
        Route::get('/about/us/features/delete/{id}', [AboutUsController::class, 'delete'])->name('aboutus-delete');
        Route::get('/about/us/features/inactive/{id}', [AboutUsController::class, 'inactive'])->name('aboutus-inactive');
        Route::get('/about/us/features/active/{id}', [AboutUsController::class, 'active'])->name('aboutus-active');

        Route::get('service/create', [ServiceController::class, 'create'])->name('service-create');
        Route::post('service/store', [ServiceController::class, 'store'])->name('service-store');
        Route::get('service', [ServiceController::class, 'index'])->name('service');
        Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('service-edit');
        Route::post('service/update', [ServiceController::class, 'update'])->name('service-update');
        Route::get('service/delete/{id}', [ServiceController::class, 'delete'])->name('service-delete');
        Route::get('service/inactive/{id}', [ServiceController::class, 'inactive'])->name('service-inactive');
        Route::get('service/active/{id}', [ServiceController::class, 'active'])->name('service-active');


        Route::get('feature/content/create', [FeatureController::class, 'create'])->name('feature-create');
        Route::post('feature/content/store', [FeatureController::class, 'store'])->name('feature-store');
        Route::get('feature/content', [FeatureController::class, 'index'])->name('feature');
        Route::post('feature/content/update', [FeatureController::class, 'update'])->name('feature-update');


        Route::get('faq/create', [FaqController::class, 'create'])->name('faq-create');
        Route::post('faq/store', [FaqController::class, 'store'])->name('faq-store');
        Route::get('faq', [FaqController::class, 'index'])->name('faq');
        Route::get('faq/edit/{id}', [FaqController::class, 'edit'])->name('faq-edit');
        Route::post('faq/update', [FaqController::class, 'update'])->name('faq-update');
        Route::get('faq/delete/{id}', [FaqController::class, 'delete'])->name('faq-delete');
        Route::get('faq/inactive/{id}', [FaqController::class, 'inactive'])->name('faq-inactive');
        Route::get('faq/active/{id}', [FaqController::class, 'active'])->name('faq-active');


        Route::get('team/create', [TeamController::class, 'create'])->name('team-create');
        Route::post('team/store', [TeamController::class, 'store'])->name('team-store');
        Route::get('team', [TeamController::class, 'index'])->name('team');
        Route::get('team/edit/{id}', [TeamController::class, 'edit'])->name('team-edit');
        Route::post('team/update/{id}', [TeamController::class, 'update'])->name('team-update');
        Route::get('team/delete/{id}', [TeamController::class, 'delete'])->name('team-delete');
        Route::get('team/inactive/{id}', [TeamController::class, 'inactive'])->name('team-inactive');
        Route::get('team/active/{id}', [TeamController::class, 'active'])->name('team-active');

        Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonial-create');
        Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('testimonial-store');
        Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');
        Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial-edit');
        Route::post('testimonial/update', [TestimonialController::class, 'update'])->name('testimonial-update');
        Route::get('testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial-delete');
        Route::get('testimonial/inactive/{id}', [TestimonialController::class, 'inactive'])->name('testimonial-inactive');
        Route::get('testimonial/active/{id}', [TestimonialController::class, 'active'])->name('testimonial-active');


        Route::get('portfolio/category/create', [CategoryController::class, 'create'])->name('category-create');
        Route::post('portfolio/category/store', [CategoryController::class, 'store'])->name('category-store');
        Route::get('portfolio/category', [CategoryController::class, 'index'])->name('category');
        Route::get('portfolio/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
        Route::post('portfolio/category/update', [CategoryController::class, 'update'])->name('category-update');
        Route::get('portfolio/category/delete/{id}', [CategoryController::class, 'delete'])->name('category-delete');


        Route::get('portfolio/create', [PortfolioController::class, 'create'])->name('portfolio-create');
        Route::post('portfolio/store', [PortfolioController::class, 'store'])->name('portfolio-store');
        Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio');
        Route::get('portfolio/edit/{id}', [PortfolioController::class, 'edit'])->name('portfolio-edit');
        Route::post('portfolio/update', [PortfolioController::class, 'update'])->name('portfolio-update');
        Route::get('portfolio/inactive/{id}', [PortfolioController::class, 'inactive'])->name('portfolio-inactive');
        Route::get('portfolio/active/{id}', [PortfolioController::class, 'active'])->name('portfolio-active');
        Route::get('portfolio/delete/{id}', [PortfolioController::class, 'delete'])->name('portfolio-delete');


        Route::get('project/create', [ProjectController::class, 'create'])->name('project-create');
        Route::post('project/store', [ProjectController::class, 'store'])->name('project-store');
        Route::get('project', [ProjectController::class, 'index'])->name('project');
        Route::get('project/edit/{id}', [ProjectController::class, 'edit'])->name('project-edit');
        Route::post('project/update', [ProjectController::class, 'update'])->name('project-update');
        Route::get('project/inactive/{id}', [ProjectController::class, 'inactive'])->name('project-inactive');
        Route::get('project/active/{id}', [ProjectController::class, 'active'])->name('project-active');
        Route::get('project/delete/{id}', [ProjectController::class, 'delete'])->name('project-delete');


        Route::get('user/contact', [ContactController::class, 'index'])->name('user-contact');
        Route::get('user/enquiry/{id}', [ContactController::class, 'delete'])->name('user-contact-delete');

        Route::get('package/create', [PackageController::class, 'create'])->name('package-create');
        Route::post('package/store', [PackageController::class, 'store'])->name('package-store');
        Route::get('package', [PackageController::class, 'index'])->name('package');
        Route::get('package/edit/{id}', [PackageController::class, 'edit'])->name('package-edit');
        Route::post('package/update/{id}', [PackageController::class, 'update'])->name('package-update');
        Route::get('package/delete/{id}', [PackageController::class, 'delete'])->name('package-delete');
        Route::get('package/inactive/{id}', [PackageController::class, 'inactive'])->name('package-inactive');
        Route::get('package/active/{id}', [PackageController::class, 'active'])->name('package-active');


        Route::get('order', [OrderController::class, 'index'])->name('order');
        Route::post('order/status/update', [OrderController::class, 'updateStatusOrder'])->name('order-status-update');
        Route::get('order/delete/{id}', [OrderController::class, 'delete'])->name('order-delete');

        Route::get('user/profile', [ProfileController::class, 'index'])->name('user-profile');
        Route::post('user/profile/update', [ProfileController::class, 'update'])->name('user-profile-update');

    });

});
