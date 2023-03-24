<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MainController;
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

Route::any('/', function () {
    return redirect('crm-login');
});

Route::get('forgot-password',  [MainController::class,'forgotPassword']);
Route::post('send-reset-password-mail',  [MainController::class,'resetPassword']);

/**
 * Login Routes
 */
Route::get('/crm-login', [MainController::class,'showLogin'])->name('crm-login');
Route::post('/do-login',  [MainController::class,'doLogin'])->name('do-login');
Route::get('/register', [MainController::class,'openRegisterForm'])->name('register');
Route::post('/register', [MainController::class,'register'])->name('register');

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */

    Route::group(['middleware' => ['web']], function()
    {

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/dashboard',[PatientController::class,'index']);
        Route::get('/get_patient_data/{id}',[PatientController::class,'show']);
        Route::post('/get_patient_data/:id',[PatientController::class,'show']);
        Route::get('/open-patient-form',[PatientController::class,'create']);
        Route::post('/insert-patient-data',[PatientController::class,'store']);

        Route::post('/update-patient-details/{id}',[PatientController::class,'update']);
        Route::get('logout', [MainController::class,'doLogout'])->name('logout');
    });
});


