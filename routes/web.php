<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')->group(function (){
    Route::get('/faktury', [InvoicesController::class, 'index'])->name('invoices.index');
    Route::get('faktury/dodaj', [InvoicesController::class, 'create'])->name('invoices.create');
    Route::get('/faktury/pobierz/{id}', [InvoicesController::class, 'saveAsPdf'])->name('invoices.export');
    Route::get('faktury/edytuj/{id}', [InvoicesController::class, 'edit'])->name('invoices.edit');
    Route::post('faktury/zapisz', [InvoicesController::class, 'store'])->name('invoices.store');
    Route::put('faktury/zmien/{id}', [InvoicesController::class, 'update'])->name('invoices.update');
    Route::delete('faktury/usun/{id}', [InvoicesController::class, 'delete'])->name('invoices.delete');

    Route::resource('/klienci', CustomersController::class, ['names' => 'customers']);
    Route::view('/profile', 'auth.profile')->name('profile');
    Route::view('/zmiana-hasla', 'auth.passwords.change')->name('password.change');
    Route::view('/statystyki', 'stats')->name('stats');

    Route::middleware('is_admin')->prefix('admin')->group(function () {
       Route::view('panel', 'admin.panel')->name('admin.panel');
       Route::put('zmien-dostep/{user_id}', [AdminController::class, 'changeAccessForUser'])->name('admin.change');
    });
});



Auth::routes();
