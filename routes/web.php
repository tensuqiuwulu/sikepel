<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
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

Route::resource('/keluhan', KeluhanController::class)->only(['create', 'store', 'index', 'edit', 'update', 'destroy']);
Route::resource('/bidang', BidangController::class)->only(['create', 'store', 'index', 'edit', 'update', 'destroy']);
Route::resource('/ulasan', UlasanController::class)->only(['store', 'index', 'edit', 'update', 'destroy']);
Route::resource('/admin', AdminController::class)->only(['create', 'store', 'index', 'edit', 'update', 'destroy']);
Route::resource('/pengguna', PenggunaController::class)->only(['create', 'store', 'index', 'edit', 'update', 'destroy']);
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/registration', [RegisterController::class, 'show']);
Route::post('/registration', [RegisterController::class, 'store']);
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::get('/', [Controller::class, 'home'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/ulasan/create/{id}', [UlasanController::class, 'create'])->name('ulasan-create');
Route::post('/ulasan/store', [UlasanController::class, 'save'])->name('ulasan-store');
Route::get('/ulasan/detail/{id}', [UlasanController::class, 'detailUlasan'])->name('ulasan-detail');
Route::get('/keluhan/detail/{id}', [KeluhanController::class, 'detailKeluhan'])->name('keluhan-detail');
Route::get('/profile', [Controller::class, 'profile'])->name('profile');
Route::get('/edit-profile', [Controller::class, 'editProfile'])->name('edit-profile');
Route::post('/update-profile', [Controller::class, 'updateProfile'])->name('update-profile');
