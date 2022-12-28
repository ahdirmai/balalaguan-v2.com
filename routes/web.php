<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PeriodController;
use Illuminate\Support\Facades\Auth;
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
    return view('pages.admin.index');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    //Category
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    
    // Period
    Route::get('periods', [PeriodController::class, 'index'])->name('periods');
    
});

Route::middleware('role:user')->group(function () {
    // After login redirect to here
});
