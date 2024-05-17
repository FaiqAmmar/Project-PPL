<?php

use App\Http\Controllers\C_BahanAjar;
use App\Http\Controllers\C_JenisEdukasi;
use App\Http\Controllers\pemerintahEdukasiController;
use App\Http\Controllers\PenggunaEdukasi;
use App\Http\Controllers\MateriEdukasiController;
use App\Http\Controllers\SubMateriEdukasiController;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Register;
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_Modul;
use Illuminate\Support\Facades\Route;
use App\Models\JenisEdukasi;
use App\Models\MateriEdukasi;
use App\Models\SubMateriEdukasi;

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

//Route Getting Started
Route::get('/', function () {return view('auth.V_landing');});

//Route Signup
Route::get('/register-role', function() {return view('auth.V_register-role');})->name('register-role');
Route::get('/register-user', [C_Register::class ,'user']);
Route::get('/register-gov', [C_Register::class ,'gov']);
Route::post('/register-user', [C_Register::class ,'register_user']);
Route::post('/register-gov', [C_Register::class ,'register_gov']);

//Route Login
Route::get('/login', function () {return view('auth.V_login');})->name('login');
Route::post('/login',[C_Login::class, 'login']);
Route::get('/logout', [C_login::class ,'logout'])->name('logout');

//Route Profil
Route::get('/profil', [C_User::class ,'index'])->name('view.profil');
Route::get('/edit-profil/{id}', [C_User::class ,'edit_profil'])->name('edit.profil');
Route::put('/edit-profil', [C_User::class ,'update_profil'])->name('update.profil');
Route::middleware(['admin'])->group(function () {
    Route::get('/lihat-user', [C_User::class , 'lihat_user']);
    Route::get('/lihat-gov', [C_User::class , 'lihat_gov']);
});

//Route Dashboard
Route::get('/modul', [C_Modul::class , 'index']);
Route::middleware(['gov'])->group(function () {
    Route::post('/tambah-modul', [C_Modul::class , 'nambah_modul'])->name('add.modul');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/edit-modul', [C_User::class ,'edit_modul'])->name('edit.modul');
    Route::put('/edit-modul/{id}', [C_Modul::class , 'update_modul'])->name('update.modul');
});

//Route Edukasi
Route::get('/edukasi', [C_JenisEdukasi::class , 'index'])->name('edukasi');

//Route Bahan Ajar
Route::get('/bahan-ajar', [C_BahanAjar::class , 'index'])->name('bahan-ajar');
Route::post('/tambah-bahan-ajar', [C_BahanAjar::class , 'nambah_bahan_ajar'])->name('add.bahan-ajar');