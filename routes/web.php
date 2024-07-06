<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrailController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/load-more', [TrailController::class, 'loadmore']);
Route::get('/jalur', [TrailController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/sop', [SopController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::resource('ticket', TicketController::class)->except(['create', 'store']);
    Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('is_admin');
    // Route admin lainnya dapat ditambahkan di sini
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::post('/admin/set-price', [AdminController::class, 'setPrice'])->name('admin.set_price');
    Route::get('/admin/registrations/{id}', [AdminController::class, 'showRegistration'])->name('admin.registrations.show');

});


Route::put('/admin/update-status/{id}', [AdminController::class, 'updateStatus'])->name('admin.update_status');
