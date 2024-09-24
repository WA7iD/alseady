<?php

//use App\Http\Controllers\Api\Position\PositionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Blog\BlogController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Role\RoleController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Offer\OfferController;
use App\Http\Controllers\Dashboard\Order\OrderController;
use App\Http\Controllers\Dashboard\Doctor\DoctorController;
use App\Http\Controllers\Dashboard\Slider\SliderController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\Contact\ContactController;
use App\Http\Controllers\Dashboard\Activity\ActivityController;
use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\Position\PositionController;
use App\Http\Controllers\Dashboard\SiteInfo\SiteInfoController;
use App\Http\Controllers\Dashboard\Subscription\SubscriptionController;
use App\Http\Controllers\Dashboard\EmploymentApplication\EmploymentApplicationController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', [AuthController::class, '_login'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('/');

        Route::resource('admins/{role}', AdminController::class)->except('show')->parameters(['{role}' => 'admin'])->names([
            'index' => 'admins.index',
            'create' => 'admins.create',
            'store' => 'admins.store',
            'edit' => 'admins.edit',
            'update' => 'admins.update',
            'destroy' => 'admins.destroy',
        ]);
        Route::resource('roles', RoleController::class)->except(['show']);

        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('doctors', DoctorController::class);
        Route::resource('offers', OfferController::class);
        Route::resource('subscriptions', SubscriptionController::class);
        Route::resource('activities', ActivityController::class);
        Route::POST('delete-image/{id}', [ActivityController::class, 'activityImageDestroy'])->name('activity_image.destroy');
        
        Route::resource('positions', PositionController::class);
        Route::resource('employment_applications', EmploymentApplicationController::class)->only('index', 'show', 'destroy');
        Route::resource('blogs', BlogController::class);
        Route::resource('orders', OrderController::class)->except('create', 'store');

        Route::resource('contacts', ContactController::class)->only('index', 'show', 'destroy');

        Route::resource('sliders', SliderController::class);

        Route::get('site-info', [SiteInfoController::class, 'edit'])->name('site_info.edit');
        Route::post('site-info', [SiteInfoController::class, 'update'])->name('site_info.update');

        // Route::group(['prefix' => 'structures'], function () {
        //     Route::resource('home-content', \App\Http\Controllers\Dashboard\Structure\HomeController::class)->only(['index', 'store']);
        //     Route::resource('about-content', AboutController::class)->only(['index', 'store']);
        //     Route::resource('contact-content', ContactContentController::class)->only(['index', 'store']);
        //     Route::resource('faqs-content', FaqController::class)->only(['index', 'store']);
        //     Route::resource('privacy-policy-content', PrivacyPolicyController::class)->only(['index', 'store']);
        // });

    });
});
