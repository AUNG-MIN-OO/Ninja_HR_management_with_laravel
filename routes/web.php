<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

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
Auth::routes(['register'=>false]);

Route::middleware('auth')->group(function (){
    Route::get('/','PageController@home');

    Route::resource('employee','EmployeeController');
    Route::get('employee/datatable/ssd','EmployeeController@ssd');

    Route::get('profile','ProfileController@profile')->name('profile');

    Route::resource('department','DepartmentController');
    Route::get('department/datatable/ssd','DepartmentController@ssd');

    Route::resource('role','RoleController');
    Route::get('role/datatable/ssd','RoleController@ssd');

    Route::resource('permission','PermissionController');
    Route::get('permission/datatable/ssd','PermissionController@ssd');

    Route::resource('company-setting','CompanySettingController')->only(['edit','update','show']);
});

