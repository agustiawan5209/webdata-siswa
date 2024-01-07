<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;

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

// Routing untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routing untuk registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Routting untuk halaman dashboard
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/', function () {
    return view('welcome');
});

// Controller Siswa
Route::group(['prefix'=> 'siswa', 'as'=> 'Siswa.'], function () {
    Route::controller(SiswaController::class)->group(function(){
        Route::get('form', 'create')->name('tambah');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('store', 'store')->name('store');
        Route::put('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'delete')->name('delete');
    });
});

