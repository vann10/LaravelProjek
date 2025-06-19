<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Arahkan dashboard ke TransactionController method index
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');

    // Rute untuk Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Gunakan resource controller untuk semua action CRUD transaksi
    // Menggunakan ->except(['index']) adalah best practice agar tidak duplikat dengan /dashboard
    Route::resource('transactions', TransactionController::class)->except(['index']);
});

require __DIR__.'/auth.php';