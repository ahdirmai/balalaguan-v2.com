<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserTicketController;
use App\Http\Controllers\UserTransactionController;
use App\Models\Category;
use App\Models\Period;
use App\Models\Phase;
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
    $periods = Period::with('category', 'phase')->get();
    $phases = Phase::all();
    $categories = Category::all();
    $data = [
        'periods' => $periods,
        'phases' => $phases,
        'categories' => $categories,
    ];
    // return response()->json($data);
    return view('wellcome', $data);
})->name('landing-page');


Auth::routes();

// User

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('transaction/detail/{transaction_id}', [UserTransactionController::class, 'show'])->name('transaction.show');
    Route::post('transaction}', [UserTransactionController::class, 'store'])->name('transaction.store');
    Route::get('transaction/{period_id}/{amount}', [UserTransactionController::class, 'create'])->name('transaction.create');
    Route::put('transaction/payment/{transaction_id}', [UserTransactionController::class, 'update'])->name('transaction.update');
    // Route::get('transaction', function() { return view('pages.user.transaction.index'); })->name('transaction.index');
    Route::get('ticket', [UserTicketController::class, 'index'])->name('ticket.index');
    Route::get('transaction', [UserTransactionController::class, 'index'])->name('transaction.index');
});

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
    Route::get('transactions/all', [TransactionController::class, 'indexAll'])->name('transactions.indexAll');
    Route::resource('transactions', TransactionController::class);

    // Ticket
    Route::resource('ticket', TicketController::class);
});

Route::middleware('role:user')->group(function () {
    // After login redirect to here
});
