<?php

use App\Http\Controllers\C_JenisEdukasi;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Register;
use App\Http\Controllers\C_User;
use App\Http\Controllers\C_Modul;
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
Route::get('/edukasi', function() {return view('edukasi.V_edukasi');})->name('edukasi');
Route::post('/fitur-edukasi-admin', [C_JenisEdukasi::class, 'store'])->name('judulEdu.store');

//Route Bahan Ajar



//Route User
Route::get('/profil-user', function () {
    return view('user.profil-user');
});

Route::get('/fitur-edukasi-user', function () {
    return view('user.fitur-edukasi-user');
});

//Route Gov
Route::get('/profil-gov', function () {
    return view('gov.profil-gov');
});

Route::get('/dashboard-modul-gov', function () {
    return view('gov.dashboard-modul-gov');
});

Route::get('/fitur-edukasi-gov', function () {
    return view('gov.fitur-edukasi-gov');
});

//Route Admin
Route::get('/profil-admin', function () {
    return view('admin.profil-admin');
});

Route::get('/melihat-user', function () {
    return view('admin.melihat-user');
});

Route::get('/melihat-gov', function () {
    return view('admin.melihat-gov');
});

Route::get('/fitur-edukasi-admin', function () {
    return view('admin.fitur-edukasi-admin');
});