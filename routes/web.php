<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
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
    return view('wellcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Barcode scanner
    Route::get('scanner', [AdminDashboardController::class, 'scanner'])->name('scanner');

    //Category
    Route::resource('categories', CategoryController::class);
    
    // Phase
    Route::resource('phases', PhaseController::class);

    // Period
    Route::resource('periods', PeriodController::class);

    // Event
    Route::get('event', [EventController::class, 'index'])->name('event.index');
    Route::put('event', [EventController::class, 'update'])->name('event.update');

    // Transaction
    Route::resource('transactions', TransactionController::class);

    // Ticket
    Route::resource('ticket', TicketController::class);
});

Route::middleware('role:user')->group(function () {
    // After login redirect to here
});
