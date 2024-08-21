<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Front\Enquiry\EnquiryController;
use App\Http\Controllers\Front\FooterPage\FooterPageManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/cc', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return response()->json('Cache Cleared.');
});

Route::post('enquiry_general', [EnquiryController::class, 'enquiryGeneral'])->name('enquiry_general');
Route::post('save-enquiry', [EnquiryController::class, 'saveEnquiry'])->name('save-enquiry');

Route::get('/', [FooterPageManagementController::class, 'index'])->name('home');
Route::get('/about', [FooterPageManagementController::class, 'aboutUs'])->name('about');
Route::get('/aboutjimcorbett', [FooterPageManagementController::class, 'aboutJimCorbett'])->name('aboutjimcorbett');
Route::get('/faq', [FooterPageManagementController::class, 'frequentlyAskedQuestions'])->name('faq');
Route::get('/contact', [FooterPageManagementController::class, 'contactUs'])->name('contact');
Route::get('/gallery', [FooterPageManagementController::class, 'galleryPage'])->name('gallery');
Route::get('/gallery-detail/{slug}', [FooterPageManagementController::class, 'galleryPageDetail'])->name('gallery-detail');
Route::get('/privacy-policy', [FooterPageManagementController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [FooterPageManagementController::class, 'termAndConditions'])->name('terms-and-conditions');



