<?php

use App\Http\Controllers\Admin\WeddingProgramsReview\WeddingProgramsReviewController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Enquiry\EnquiryController;
use App\Http\Controllers\Admin\FormFields\FormFieldsController;
use App\Http\Controllers\Admin\Setting\settingsController;
use App\Http\Controllers\Admin\PageManagement\PageManagementController;
use App\Http\Controllers\Admin\WeddingPrograms\WeddingProgramsController;
use App\Http\Controllers\Admin\WeddingProgramsImage\WeddingProgramsImageController;
use App\Http\Controllers\Admin\WeddingProgramsVideo\WeddingProgramsVideoController;

/*
|--------------------------------------------------------------------------
| Superadmin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register superadmin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "superadmin" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthController::class, 'login_view'])->name('viewAdminLogin');
    Route::post('admin/login', [AuthController::class, 'postLogin'])->name('adminLogin');
    Route::post('admin/login/with/otp', [AuthController::class, 'adminLoginWithOtp'])->name('adminLoginWithOtp');
    Route::post('verify/admin/login/with/otp', [AuthController::class, 'verifyAdminLoginWithOtp'])->name('verifyAdminLoginWithOtp');
});


Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'viewDashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/dashboard/enquiry/delete/', [AuthController::class, 'deleteCustomer'])->name('deleteCustomer');



    Route::get('form-fields', [FormFieldsController::class, 'showFormFields'])->name('showFormFields');
    Route::post('form-fields/store', [FormFieldsController::class, 'saveFormFields'])->name('save-enuiry-form-fields-data');
    Route::post('form-fields/update/{id}', [FormFieldsController::class, 'updateFormFields'])->name('update-enuiry-form-fields-data');

    Route::get('venue/create', [FormFieldsController::class, 'createVenue'])->name('venue-create');
    Route::post('venue/store', [FormFieldsController::class, 'storeVenue'])->name('venue-store');
    Route::get('venue/edit/{id}', [FormFieldsController::class, 'editVenue'])->name('venue-edit');
    Route::post('venue/update/{id}', [FormFieldsController::class, 'updateVenue'])->name('venue-update');
    Route::post('venue/status/update', [FormFieldsController::class, 'updateVenueStatus'])->name('update-venue-status');
    Route::get('venue/delete/{id}', [FormFieldsController::class, 'venueDelete'])->name('venue-delete');


    Route::get('wedding-function/create', [FormFieldsController::class, 'createWeddingFunction'])->name('wedding-function-create');
    Route::post('wedding-function/store', [FormFieldsController::class, 'storeWeddingFunction'])->name('wedding-function-store');
    Route::get('wedding-function/edit/{id}', [FormFieldsController::class, 'editWeddingFunction'])->name('wedding-function-edit');
    Route::post('wedding-function/update/{id}', [FormFieldsController::class, 'updateWeddingFunction'])->name('wedding-function-update');
    Route::post('wedding-function/status/update', [FormFieldsController::class, 'updateWeddingFunctionStatus'])->name('update-wedding-functions-status');
    Route::get('wedding-function/delete/{id}', [FormFieldsController::class, 'deleteWeddingFunction'])->name('wedding-functions-delete');


    Route::get('wedding-service/create', [FormFieldsController::class, 'createWeddingService'])->name('wedding-service-create');
    Route::post('wedding-service/store', [FormFieldsController::class, 'storeWeddingService'])->name('wedding-service-store');
    Route::get('wedding-service/edit/{id}', [FormFieldsController::class, 'editWeddingService'])->name('wedding-service-edit');
    Route::post('wedding-service/update/{id}', [FormFieldsController::class, 'updateWeddingService'])->name('wedding-service-update');
    Route::post('wedding-service/status/update', [FormFieldsController::class, 'updateWeddingServiceStatus'])->name('update-wedding-service-status');
    Route::get('wedding-service/delete/{id}', [FormFieldsController::class, 'deleteWeddingService'])->name('wedding-service-delete');


    //########################################### General Enquiries start #########################//
    Route::get('/general-enquiries-list', [EnquiryController::class, 'generalEnquiry'])->name('general-enquiry-list');
    Route::delete('/general-enquiries-delete/{id}', [EnquiryController::class, 'generalEnquiryDelete'])->name('general.enquiry.delete');

    //########################################### Razorpay Setting start #########################//

    Route::get('/razorpay-setting-index', [settingsController::class, 'razorpaySettingView'])->name('razorpay-setting-view');
    Route::post('/razorpay-setting-store', [settingsController::class, 'razorpaySettingStore'])->name('razorpay.settings.store');

    //########################################### Contact Setting start #########################//

    Route::get('/contact-setting-index', [settingsController::class, 'contactSettingView'])->name('contact-setting-view');
    Route::post('/contact-setting-store', [settingsController::class, 'contactSettingStore'])->name('contact.settings.store');

    //########################################### Latest News start #########################//

    Route::get('/news-setting-index', [settingsController::class, 'newsSettingView'])->name('news-setting-view');
    Route::post('/news-setting-store', [settingsController::class, 'newsSettingStore'])->name('news.settings.store');

    //########################################### My Account start #########################//

    Route::get('/account-setting-index', [settingsController::class, 'accountSettingView'])->name('account-setting-view');
    Route::post('/account-setting-store', [settingsController::class, 'accountSettingStore'])->name('account.settings.store');

    //########################################### Change Password start #########################//

    Route::get('/password-setting-index', [settingsController::class, 'passwordSettingView'])->name('password-setting-view');
    Route::post('/password-setting-store', [settingsController::class, 'passwordSettingStore'])->name('password.settings.store');

    //########################################### Page Management start #########################//

    Route::get('/superadmin/page-management/home/index', [PageManagementController::class, 'homeIndex'])->name('page.mangement.home.index');
    Route::post('/superadmin/page-management/home/store', [PageManagementController::class, 'homeStore'])->name('page.mangement.home.store');

    Route::get('/superadmin/page-management/jungle/index', [PageManagementController::class, 'jungleIndex'])->name('page.mangement.jungle.index');
    Route::post('/superadmin/page-management/jungle/store', [PageManagementController::class, 'jungleStore'])->name('page.mangement.jungle.store');

    Route::get('/superadmin/page-management/devalia/index', [PageManagementController::class, 'devaliaIndex'])->name('page.mangement.devalia.index');
    Route::post('/superadmin/page-management/devalia/store', [PageManagementController::class, 'devaliaStore'])->name('page.mangement.devalia.store');

    Route::get('/superadmin/page-management/kankai/index', [PageManagementController::class, 'kankaiIndex'])->name('page.mangement.kankai.index');
    Route::post('/superadmin/page-management/kankai/store', [PageManagementController::class, 'kankaiStore'])->name('page.mangement.kankai.store');

    Route::get('/superadmin/page-management/girnar/index', [PageManagementController::class, 'girnarIndex'])->name('page.mangement.girnar.index');
    Route::post('/superadmin/page-management/girnar/store', [PageManagementController::class, 'girnarStore'])->name('page.mangement.girnar.store');

    Route::get('/superadmin/page-management/hotel/index', [PageManagementController::class, 'hotelIndex'])->name('page.mangement.hotel.index');
    Route::post('/superadmin/page-management/hotel/store', [PageManagementController::class, 'hotelStore'])->name('page.mangement.hotel.store');

    Route::get('/superadmin/page-management/package/index', [PageManagementController::class, 'packageIndex'])->name('page.mangement.package.index');
    Route::post('/superadmin/page-management/package/store', [PageManagementController::class, 'packageStore'])->name('page.mangement.package.store');

    Route::get('/superadmin/page-management/contact/index', [PageManagementController::class, 'contactIndex'])->name('page.mangement.contact.index');
    Route::post('/superadmin/page-management/contact/store', [PageManagementController::class, 'contactStore'])->name('page.mangement.contact.store');

    Route::get('/superadmin/page-management/faq/index', [PageManagementController::class, 'faqIndex'])->name('page.mangement.faq.index');
    Route::post('/superadmin/page-management/faq/store', [PageManagementController::class, 'faqStore'])->name('page.mangement.faq.store');

    Route::get('/superadmin/page-management/doDoNot/index', [PageManagementController::class, 'doDoNotIndex'])->name('page.mangement.doDoNot.index');
    Route::post('/superadmin/page-management/doDoNot/store', [PageManagementController::class, 'doDoNotStore'])->name('page.mangement.doDoNot.store');

    Route::get('/superadmin/page-management/history/index', [PageManagementController::class, 'historyIndex'])->name('page.mangement.history.index');
    Route::post('/superadmin/page-management/history/store', [PageManagementController::class, 'historyStore'])->name('page.mangement.history.store');

    Route::get('/superadmin/page-management/permit/index', [PageManagementController::class, 'permitIndex'])->name('page.mangement.permit.index');
    Route::post('/superadmin/page-management/permit/store', [PageManagementController::class, 'permitStore'])->name('page.mangement.permit.store');

    Route::get('/superadmin/page-management/reach/index', [PageManagementController::class, 'reachIndex'])->name('page.mangement.reach.index');
    Route::post('/superadmin/page-management/reach/store', [PageManagementController::class, 'reachStore'])->name('page.mangement.reach.store');

    Route::get('/superadmin/page-management/term/index', [PageManagementController::class, 'termIndex'])->name('page.mangement.term.index');
    Route::post('/superadmin/page-management/term/store', [PageManagementController::class, 'termStore'])->name('page.mangement.term.store');

    Route::get('/superadmin/page-management/privacy/index', [PageManagementController::class, 'privacyIndex'])->name('page.mangement.privacy.index');
    Route::post('/superadmin/page-management/privacy/store', [PageManagementController::class, 'privacyStore'])->name('page.mangement.privacy.store');

    Route::get('/superadmin/page-management/pricing/index', [PageManagementController::class, 'pricingIndex'])->name('page.mangement.pricing.index');
    Route::post('/superadmin/page-management/pricing/store', [PageManagementController::class, 'pricingStore'])->name('page.mangement.pricing.store');

    Route::get('/superadmin/page-management/about/index', [PageManagementController::class, 'aboutIndex'])->name('page.mangement.about.index');
    Route::post('/superadmin/page-management/about/store', [PageManagementController::class, 'aboutStore'])->name('page.mangement.about.store');

    Route::get('/superadmin/page-management/cancellation/index', [PageManagementController::class, 'cancellationIndex'])->name('page.mangement.cancellation.index');
    Route::post('/superadmin/page-management/cancellation/store', [PageManagementController::class, 'cancellationStore'])->name('page.mangement.cancellation.store');

    Route::get('/superadmin/page-management/festival/index', [PageManagementController::class, 'festivalIndex'])->name('page.mangement.festival.index');
    Route::post('/superadmin/page-management/festival/store', [PageManagementController::class, 'festivalStore'])->name('page.mangement.festival.store');

    Route::get('/superadmin/page-management/manager/index', [PageManagementController::class, 'managerIndex'])->name('page.management.manager.index');
    Route::get('/superadmin/page-management/manager/directory/{directory}', [PageManagementController::class, 'viewDirectory'])->name('page.management.manager.directory');
    Route::post('/superadmin/page-management/manager/upload', [PageManagementController::class, 'uploadFile'])->name('page.management.manager.upload');
    Route::delete('/superadmin/page-management/manager/delete/{file}', [PageManagementController::class, 'deleteFile'])->name('page.management.manager.delete');

    Route::get('/superadmin/page-management/weekend/index', [PageManagementController::class, 'weekendIndex'])->name('page.mangement.weekend.index');
    Route::get('removeHotel', [PageManagementController::class, 'destroyHotel'])->name('page.mangement.term.hotel.delete');

    Route::post('/superadmin/page-management/weekend/store', [PageManagementController::class, 'weekendStore'])->name('page.mangement.weekend.store');

    //wedding programms crud
    Route::get('wedding-programs-list', [WeddingProgramsController::class, 'index'])->name('wedding-programs-list');
    Route::get('wedding-programs-list-add-item', [WeddingProgramsController::class, 'createWeddingProgram'])->name('create-wedding-program');
    Route::post('wedding-programs-management/add-wedding-programs', [WeddingProgramsController::class, 'storeWeddingProgram'])->name('store-wedding-program');
    Route::get('wedding-programs-management/edit-wedding-programs/{id}', [WeddingProgramsController::class, 'editWeddingProgram'])->name('edit-wedding-program');
    Route::post('wedding-programs-management/update-wedding-programs/{id}', [WeddingProgramsController::class, 'updateWeddingProgram'])->name('update-wedding-program');
    Route::post('wedding-programs-management/updateAvailability', [WeddingProgramsController::class, 'updateWeddingProgramStatus'])->name('update-status-wedding-program');
    Route::get('wedding-programs-management/delete/{id}', [WeddingProgramsController::class, 'deleteWeddingProgram'])->name('delete-wedding-program');

    //get particular wedding program images,videos,review
    Route::get('wedding-program-items-list/{wedding_program_id}', [WeddingProgramsController::class, 'getWeddingProgramItems'])->name('wedding-program-items-list');

    //upload and delete particular wedding program images
    Route::post('wedding-program-upload-image', [WeddingProgramsController::class, 'uploadWeddingProgramImage'])->name('upload-wedding-program-image');
    Route::post('wedding-program-delete-image', [WeddingProgramsController::class, 'deleteWeddingProgramImage'])->name('delete-wedding-program-image');

    //upload and delete particular wedding program videos
    Route::post('wedding-program-upload-video', [WeddingProgramsController::class, 'uploadWeddingProgramVideo'])->name('upload-wedding-program-video');
    Route::post('wedding-program-delete-video', [WeddingProgramsController::class, 'deleteWeddingProgramVideo'])->name('delete-wedding-program-video');

    //crud particular wedding program review
    Route::post('wedding-program-store-review', [WeddingProgramsController::class, 'storeWeddingProgramReview'])->name('store-wedding-program-review');
    Route::post('wedding-programs-review/update-review/{wedding_program_id}/{wedding_program_review_id}', [WeddingProgramsController::class, 'updateWeddingProgramReview'])->name('update-wedding-program-review');
    Route::post('wedding-programs-review/updateAvailability/{wedding_program_id}/{wedding_program_review_id}', [WeddingProgramsController::class, 'updateWeddingProgramReviewStatus'])->name('update-status-wedding-program-review');
    Route::get('wedding-programs-review/delete-review/{wedding_program_id}/{wedding_program_review_id}', [WeddingProgramsController::class, 'deleteWeddingProgramReview'])->name('delete-wedding-program-review');

});
