<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompanyController;

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





Route::get('/', [EmployeesController::class, 'index']);
Route::post('/employees/save', [EmployeesController::class, 'save']);
Route::post('/employees/edit', [EmployeesController::class, 'edit']);
Route::post('/employees/update', [EmployeesController::class, 'update']);


Route::get('/asset', [CompanyController::class, 'index']);
Route::post('/campany/save', [CompanyController::class, 'save']);
Route::post('/campany/edit', [CompanyController::class, 'edit']);
Route::post('/campany/update', [CompanyController::class, 'update']);


