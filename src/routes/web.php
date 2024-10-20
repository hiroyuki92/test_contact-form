<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/store', [ContactController::class, 'store'])->name('store');
Route::get('/thanks', function () {return view('thanks');})->name('thanks');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index'])->name('admin');
Route::get('/admin/search', [AuthController::class, 'search']);
});
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');