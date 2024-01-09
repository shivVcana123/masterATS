<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ModualController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivitieController;
use App\Http\Controllers\JoborderController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ListtController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginSecurityController;
use Illuminate\Support\Facades\Route;

// Route::get('/joborders/{letter?}', [JobOrderController::class, 'index'])->name('joborders.index');
Route::get('/joborders/create', [JobOrderController::class, 'create'])->name('joborders.create');
Route::post('/add/joborder', [JobOrderController::class, 'store'])->name('joborders.store');
Route::get('/joborders/details/{id?}', [JobOrderController::class, 'profileDetails'])->name('joborders.details');
Route::get('/joborder/update/{id?}', [JobOrderController::class, 'joborderUpdate'])->name('joborders.update');
Route::post('/joborder/update/save', [JobOrderController::class, 'joborderUpdateSave'])->name('joborders.update.save');
Route::get('/joborders/delete/{id?}', [JobOrderController::class, 'joborderDelete'])->name('joborders.delete');



// Route::get('/companies/index/{letter?}', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
Route::any('/companies/details/{id?}', [CompanyController::class, 'profileDetails'])->name('companies.details');
Route::get('/companies/update/{id?}', [CompanyController::class, 'updateDetails'])->name('companies.update');
Route::post('/companies/update/save', [CompanyController::class, 'companiesUpdateSave'])->name('companies.update.save');
Route::get('/companies/delete/{id?}', [CompanyController::class, 'delete'])->name('companies.delete');

Route::get('/companies/history/{id?}', [CompanyController::class, 'companyHistory'])->name('companies.history');



Route::get('/candidates/create/{job_id?}', [CandidateController::class, 'create'])->name('candidates.create');
Route::get('/candidates/details/{id?}', [CandidateController::class, 'candidatesDetails'])->name('candidates.details');
Route::get('/candidates/update/{id?}', [CandidateController::class, 'candidatesUpdate'])->name('candidates.update');
Route::post('/candidates/update/save', [CandidateController::class, 'candidatesUpdateSave'])->name('candidates.update.save');


Route::post('/candidates/list/save', [CandidateController::class, 'candidatesListSave'])->name('candidates.list.save');
Route::get('/candidates/list/delete/{id?}', [CandidateController::class, 'candidatesListDelete'])->name('candidates.list.delete');
Route::post('/candidates/list/save/entry', [CandidateController::class, 'candidatesListSaveEntry'])->name('candidates.list.save.entry');


Route::post('/candidates/add/candidate/joborder', [CandidateController::class, 'candidatesAddCandidateJoborder'])->name('candidates.add.candidate.joborder');



Route::get('/candidates/activity/delete/{id?}', [CandidateController::class, 'candidatesActivityDelete'])->name('candidates.activity.delete');
Route::post('/candidates/activity/save', [CandidateController::class, 'candidatesActivitySave'])->name('candidates.activity.save');
Route::get('/candidates/candidate/joborder/delete/{id?}', [CandidateController::class, 'candidatesJoborderDelete'])->name('candidates.candidate.joborder.delete');
Route::get('/candidates/joborder/delete/{id?}', [CandidateController::class, 'joborderDelete'])->name('candidates.joborder.delete');


Route::post('/document/upload', [DocumentController::class, 'documentUpload'])->name('document.upload');
Route::get('/document/delete/{id?}', [DocumentController::class, 'documentDelete'])->name('document.delete');
Route::get('/document/download/{id?}', [DocumentController::class, 'documentDownload'])->name('document.download');

Route::get('/contacts/create/{company_id?}', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/update', [ContactController::class, 'contactsUpdateData'])->name('contacts.update');
Route::get('/contacts/delete/{id?}', [ContactController::class, 'contactDelete'])->name('contacts.delete');
Route::get('/contacts/details/{contact_id?}', [ContactController::class, 'contactDetails'])->name('contacts.details');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'XSS', '2fa',]);

Route::post('/chart', [HomeController::class, 'chart'])->name('get.chart.data')->middleware(['auth', 'XSS',]);

Route::get('notification', [HomeController::class, 'notification']);


Route::group(['middleware' => ['auth', 'XSS']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
     Route::resource('activities', ActivitieController::class);
     Route::resource('joborders', JoborderController::class);
     Route::resource('candidates', CandidateController::class);
     Route::resource('companies', CompanyController::class);
     Route::resource('contacts', ContactController::class);
     Route::resource('listts', ListtController::class);
     Route::resource('calenders', CalenderController::class);
     Route::resource('reports', ReportController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('modules', ModualController::class);
});
// Route::post('addjoborder', [JoborderController::class, 'create'])->name('joborders.create')->middleware(['auth', 'XSS']);

Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['auth', 'XSS']);

Route::post('/role/{id}', [RoleController::class, 'assignPermission'])->name('roles_permit')->middleware(['auth', 'XSS']);

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('setting/email-setting', [SettingController::class, 'getmail'])->name('settings.getmail');
        Route::post('setting/email-settings_store', [SettingController::class, 'saveEmailSettings'])->name('settings.emails');

        Route::get('setting/datetime', [SettingController::class, 'getdate'])->name('datetime');
        Route::post('setting/datetime-settings_store', [SettingController::class, 'saveSystemSettings'])->name('settings.datetime');

        Route::get('setting/logo', [SettingController::class, 'getlogo'])->name('getlogo');
        Route::post('setting/logo_store', [SettingController::class, 'store'])->name('settings.logo');
        Route::resource('settings', SettingController::class);

        Route::get('test-mail', [SettingController::class, 'testMail'])->name('test.mail');
        Route::post('test-mail', [SettingController::class, 'testSendMail'])->name('test.send.mail');
    }
);

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware(['auth', 'XSS']);

Route::post('edit-profile', [UserController::class, 'editprofile'])->name('update.profile')->middleware(['auth', 'XSS']);

Route::group(
    ['middleware' => ['auth', 'XSS']],
    function () {
        Route::get('change-language/{lang}', [LanguageController::class, 'changeLanquage'])->name('change.language');
        Route::get('manage-language/{lang}', [LanguageController::class, 'manageLanguage'])->name('manage.language');
        Route::post('store-language-data/{lang}', [LanguageController::class, 'storeLanguageData'])->name('store.language.data');
        Route::get('create-language', [LanguageController::class, 'createLanguage'])->name('create.language');
        Route::post('store-language', [LanguageController::class, 'storeLanguage'])->name('store.language');
        Route::delete('/lang/{lang}', [LanguageController::class, 'destroyLang'])->name('lang.destroy');
        Route::get('language', [LanguageController::class, 'index'])->name('index');
    }
);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder')->middleware(['auth', 'XSS',]);

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template')->middleware(['auth', 'XSS',]);

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template')->middleware(['auth', 'XSS',]);

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate')->middleware(['auth', 'XSS',]);

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback')->middleware(['auth', 'XSS',]);

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file')->middleware(['auth', 'XSS',]);

Route::group(['prefix' => '2fa'], function () {
    Route::get('/', [UserController::class, 'profile'])->name('2fa')->middleware(['auth', 'XSS',]);
    Route::post('/generateSecret', [LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret')->middleware(['auth', 'XSS',]);
    Route::post('/enable2fa', [LoginSecurityController::class, 'enable2fa'])->name('enable2fa')->middleware(['auth', 'XSS',]);
    Route::post('/disable2fa', [LoginSecurityController::class, 'disable2fa'])->name('disable2fa')->middleware(['auth', 'XSS',]);

    // 2fa middleware
    Route::post('/2faVerify', function () {
        return redirect(URL()->previous());
    })->name('2faVerify')->middleware('2fa');
});






































Route::resource('tests', App\Http\Controllers\TestController::class)->middleware(['auth', 'XSS']);




















































































































































































































































































































































