<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () { return view('welcome'); })->name('login');
Route::post('/login', [LoginController::class, 'create']);
Route::post('logout', [LoginController::class , 'destroy']);
Route::redirect('/','/welcome');

Route::group([ 'middleware' => ['auth']] , function() {
    Route::get('/home',[EmployeeController::class,'index']);
    Route::get('/home/{employee}',[EmployeeController::class,'create']);
    Route::patch('/home/{employee}/update',[EmployeeController::class,'update']);
    Route::delete('/home/{employee}', [EmployeeController::class,'destroy']);
    Route::get('/company',[CompanyController::class,'index']);
    Route::get('/company/{company}',[CompanyController::class,'create']);
    Route::patch('/company/{company}/update',[CompanyController::class,'update']);
    Route::get('/createCompany',[CompanyController::class,'show']);
    Route::get('/createEmployee',[EmployeeController::class,'show']);
    Route::post('/createEmployee/store',[EmployeeController::class,'store']);
    Route::post('/createCompany/store',[CompanyController::class,'store']);
    Route::delete('/company/{company}', [CompanyController::class,'destroy']);
});



