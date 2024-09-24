<?php

use App\Http\Controllers\Api\Activity\ActivityController;
use App\Http\Controllers\Api\Blog\BlogController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Contact\ContactController as ContactContactController;
use App\Http\Controllers\Api\Doctor\DoctorController;
use App\Http\Controllers\Api\EmploymentApplication\EmploymentApplicationController;
use App\Http\Controllers\Api\Offer\OfferController;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Position\PositionController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\SiteInfo\SiteInfoController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'localizeApi'], function () {

    Route::get('info', [SiteInfoController::class, 'info']);
    Route::resource('categories', CategoryController::class)->only('index', 'show');
    Route::resource('doctors', DoctorController::class)->only('index', 'show');
    Route::resource('offers', OfferController::class)->only('index', 'show');
    Route::post('subscripe-offer', [OfferController::class,'subscripe']);
    
    Route::resource('positions', PositionController::class)->only('index');
    Route::resource('employment_applications', EmploymentApplicationController::class)->only('store');
    Route::resource('offers', OfferController::class)->only('index', 'show');
    Route::resource('activities', ActivityController::class)->only('index', 'show');
    Route::resource('blogs', BlogController::class)->only('index', 'show');
    Route::post('contact-us', [ContactContactController::class, 'store']);
    Route::post('order', [OrderController::class, 'store']);
});
