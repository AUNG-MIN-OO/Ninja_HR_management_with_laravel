<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\WebAuthnRegisterController;
use App\Http\Controllers\Auth\WebAuthnLoginController;

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

Route::get('/login-option',[\App\Http\Controllers\Auth\LoginController::class,'loginOption'])->name('login-option');

Route::view('/login','auth.login')->name('login');

Route::post('webauthn/register/options', [WebAuthnRegisterController::class, 'options'])
    ->name('webauthn.register.options');
Route::post('webauthn/register', [WebAuthnRegisterController::class, 'register'])
    ->name('webauthn.register');

Route::post('webauthn/login/options', [WebAuthnLoginController::class, 'options'])
    ->name('webauthn.login.options');
Route::post('webauthn/login', [WebAuthnLoginController::class, 'login'])
    ->name('webauthn.login');

Route::middleware('auth')->group(function (){
    Route::get('/','PageController@home');

    Route::resource('employee','EmployeeController');
    Route::get('employee/datatable/ssd','EmployeeController@ssd');

    Route::get('profile','ProfileController@profile')->name('profile');
    Route::get('profile/biometrics','ProfileController@biometricData');
    Route::delete('profile/biometrics-data-delete/{id}','ProfileController@biometricDataDelete');

    Route::resource('department','DepartmentController');
    Route::get('department/datatable/ssd','DepartmentController@ssd');

    Route::resource('role','RoleController');
    Route::get('role/datatable/ssd','RoleController@ssd');

    Route::resource('permission','PermissionController');
    Route::get('permission/datatable/ssd','PermissionController@ssd');

    Route::resource('company-setting','CompanySettingController')->only(['edit','update','show']);
});

