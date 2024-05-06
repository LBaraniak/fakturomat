<?php

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

Route::get('/faktury', [InvoicesController::class, 'index'])->name('invoices.index')->middleware('auth');
Route::get('faktury/dodaj', [InvoicesController::class, 'create'])->name('invoices.create');
Route::get('faktury/edytuj/{id}', [InvoicesController::class, 'edit'])->name('invoices.edit');
Route::post('faktury/zapisz', [InvoicesController::class, 'store'])->name('invoices.store');
Route::put('faktury/zmien/{id}', [InvoicesController::class, 'update'])->name('invoices.update');
Route::delete('faktury/usun/{id}', [InvoicesController::class, 'delete'])->name('invoices.delete');

Route::resource('/klienci', CustomersController::class, ['names' => 'customers']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
