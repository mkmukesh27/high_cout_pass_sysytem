<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ReportController;

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

Route::get('/', function () {
    return view('index');
});


Route::get('index', function () { return view('index'); });
Route::get('visitor_detail', [ContentController::class, 'visitor_dtl']);
Route::post('visitor_add', [ContentController::class, 'visitor_dtl_add']);
Route::get('visitor_status', [ContentController::class, 'visitor_status_form']);
Route::post('visitor_status_check', [ContentController::class, 'visitor_status_check']);
Route::get('visitor_pass/{id}', [ContentController::class, 'visitor_pass']);
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'handleLogin'])->name('handleLogin');
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['ensure.is.logged.in'])->group(function () {
    //Route::middleware(['make.menus'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/empty', function () { return view('emptypage'); });

    // Master ==================

        Route::get('/home/designation_list', [LoginController::class, 'designation_list']);
        Route::get('/home/designationForm', [LoginController::class, 'designationForm']);
        Route::post('/home/designationAddUpdate', [LoginController::class, 'add_update_designation']);
        Route::get('/home/designationEditForm/{id}', [LoginController::class, 'designationForm']);


        Route::get('/home/category_list', [LoginController::class, 'category_list']);
        Route::get('/home/categoryForm', [LoginController::class, 'categoryForm']);
        Route::post('/home/categoryAddUpdate', [LoginController::class, 'add_update_category']);
        Route::get('/home/categoryDelete/{id}', [LoginController::class, 'categoryDelete']);
        Route::get('/home/categoryEditForm/{id}', [LoginController::class, 'categoryForm']);


        
        // User Add Update =====================
        

        Route::get('/home/user_list', [LoginController::class, 'user_list']);
        Route::get('/home/userform', [LoginController::class, 'add_edit_userform']);
        Route::post('/home/user', [LoginController::class, 'add_update_user']);
        Route::get('/home/userEditForm/{id}', [LoginController::class, 'add_edit_userform']);
        Route::get('/home/user_dtl_view/{id}', [LoginController::class, 'userdtl_view']);
        

        // Visitor Add Update =====================
        

        Route::get('/home/visitor_list', [LoginController::class, 'visitor_list']);
        Route::get('/home/visitor_dtl_view/{id}', [LoginController::class, 'visitordtl_view']);
        Route::get('/home/visitor_accept/{id}', [LoginController::class, 'visitor_accept']);
        Route::get('/home/visitor_reject/{id}', [LoginController::class, 'visitor_reject']);



    // Application Add Update =====================
        
        Route::get('/home/appform', [ApplicationController::class, 'appform']);
        Route::post('/home/addappdetail', [ApplicationController::class, 'add_update_app']);
        Route::get('/home/application_list', [ApplicationController::class, 'application_list']);
        Route::get('/home/appEditForm/{id}', [ApplicationController::class, 'appform']);
        Route::post('/home/addappstatus', [ApplicationController::class, 'add_update_appStatus']);


        Route::get('/home/block_application_list', [ApplicationController::class, 'block_application_list']);
        Route::get('/home/applicationform', [ApplicationController::class, 'add_edit_application_form']);
        Route::post('/home/application', [ApplicationController::class, 'add_edit_application'])->name('add_edit_form');
        Route::get('/home/applicationDelete/{id}', [ApplicationController::class, 'applicationDelete']);
        Route::get('/home/applicationEditForm/{id}', [ApplicationController::class, 'add_edit_application_form']);
        Route::post('getdesignationAjax', [ApplicationController::class, 'get_designation_ajax']);
        Route::post('getprojectLocationAjax', [ApplicationController::class, 'get_projectLocation_ajax']);
        Route::get('/home/application_view/{id}', [ApplicationController::class, 'getApplication_details']);
        
        Route::get('/get-blocks/{id}', [ApplicationController::class, 'get_block_id']);
        Route::get('/get-scheme/{id}', [ApplicationController::class, 'get_scheme_id']);
        Route::get('/get-panchayat/{id}', [ApplicationController::class, 'get_panchayat_id']);
        Route::get('/get-village/{id}', [ApplicationController::class, 'get_village_id']);
        Route::get('/get-grand/{id}', [ApplicationController::class, 'get_grand_id']);



    // Report =========================


        Route::get('/home/aapReportList', [ReportController::class, 'application_report']);
        Route::post('/home/searchappreport', [ReportController::class, 'searchappreport']);

        

});   


