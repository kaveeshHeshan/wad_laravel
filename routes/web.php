<?php

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

Route::get('/', function () {
    return view('Pages.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('companies', 'CompaniesController');
// Route::get('companies/list', [CompaniesController::class, 'getCompanies'])->name('companies.list');
// // Route::get("company_data", [CompaniesController::class, "company_data"]);
Route::resource('employees', 'EmployeesController');