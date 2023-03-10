<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Coadmin\CoadminDashboardController;
use App\Http\Controllers\Coadmin\ScannerController;
use App\Http\Controllers\Coadmin\TicketController as CoadminTicketController;
use App\Http\Controllers\CoadminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
    if (auth()->user() != null) {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->hasRole('coadmin'))
            return redirect()->route('coadmin.dashboard.index');
    }
    // return response()->json($data);
    return view('wellcome', $data);
})->name('landing-page');


Auth::routes();

// User

Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
    Route::resource('profile', UserController::class);
    // Route::get('profile', function () {
    //     return view('pages.user.profile.index');
    // })->name('profile');
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

    // Check in
    Route::post('ticket/check-in', [TicketController::class, 'checkIn'])->name('ticket.check-in');

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
    Route::get('transactions/verified', [TransactionController::class, 'indexVerified'])->name('transactions.indexVerified');
    Route::post('transactions/reject/{transaction_id}', [TransactionController::class, 'reject'])->name('transactions.reject');
    Route::resource('transactions', TransactionController::class);

    // Ticket
    Route::resource('ticket', TicketController::class);

    // Coadmin
    Route::resource('coadmin', CoadminController::class);
});

Route::middleware('role:coadmin')->prefix('coadmin')->name('coadmin.')->group(function () {
    Route::resource('dashboard', CoadminDashboardController::class);

    // Barcode scanner
    Route::get('scanner', [ScannerController::class, 'scanner'])->name('scanner');

    // Check in
    Route::post('ticket/check-in', [TicketController::class, 'checkIn'])->name('ticket.check-in');

    // Ticket
    Route::resource('ticket', TicketController::class);
});
