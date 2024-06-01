<?php

use App\Http\Controllers\C_BahanAjar;
use App\Http\Controllers\C_BalasanKonsultasi;
use App\Http\Controllers\C_JenisEdukasi;
use App\Http\Controllers\C_Konsultasi;
use App\Http\Controllers\C_MateriEdukasi;
use App\Http\Controllers\C_SubMateriEdukasi;
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
Route::get('/register-role', [C_Register::class ,'Daftar'])->name('register-role');
Route::get('/register-user', [C_Register::class ,'PeranUser']);
Route::get('/register-gov', [C_Register::class ,'PeranGov']);
Route::post('/register-user', [C_Register::class ,'daftarUser']);
Route::post('/register-gov', [C_Register::class ,'daftarGov']);

//Route Login
Route::get('/login', [C_Login::class ,'masuk'])->name('login');
Route::post('/login',[C_Login::class, 'cekData']);
Route::get('/logout', [C_login::class ,'logout'])->name('logout');

//Route Profil
Route::get('/profil', [C_User::class ,'profil'])->name('view.profil');
Route::get('/edit-profil/{id}', [C_User::class ,'edit'])->name('edit.profil');
Route::put('/edit-profil', [C_User::class ,'setFormEdit'])->name('update.profil');
Route::put('/edit-pp', [C_User::class ,'setFormPhoto'])->name('update.profilphoto');
Route::middleware(['admin'])->group(function () {
    Route::get('/lihat-user', [C_User::class , 'akunPengguna']);
    Route::get('/lihat-gov', [C_User::class , 'akunPemerintah']);
});

//Route Modul
Route::get('/modul', [C_Modul::class , 'modul'])->withoutMiddleware(['user']);
Route::post('/tambah-modul', [C_Modul::class , 'tambah'])->name('add.modul')->middleware(['gov']);
Route::put('/edit-modul/{id}', [C_Modul::class , 'ubah'])->name('update.modul')->middleware(['admin']);

//Route Edukasi
Route::get('/edukasi', [C_JenisEdukasi::class , 'dataJenisEdukasi']);
Route::get('/edukasi/{id}', [C_MateriEdukasi::class, 'judulMateri'])->name('materi.index');
Route::get('/edukasi/{materi_edukasi_id}/{sub_id}', [C_SubMateriEdukasi::class, 'subMateri'])->name('materi.show');
Route::middleware(['admin'])->group(function () {
    Route::post('/jenis-edukasi', [C_JenisEdukasi::class , 'tambahData'])->name('jenis.store');
    Route::put('/jenis-edukasi/{id}', [C_JenisEdukasi::class , 'edit'])->name('jenis.edit');
    Route::post('materi-edukasi', [C_MateriEdukasi::class, 'tambahData'])->name('materi.store');
    Route::put('/jenis-edukasi/materi/{id}', [C_MateriEdukasi::class , 'edit'])->name('materi.edit');
    Route::post('/jenis-edukasi/materi/subMateri/', [C_SubMateriEdukasi::class,'tambahData'])->name('sub.store');
    Route::put('/update', [C_SubMateriEdukasi::class, 'edit'])->name('sub.edit');
});
Route::withoutMiddleware(['admin'])->group(function () {
    Route::post('/ulasan', [C_SubMateriEdukasi::class,'sendKomentar'])->name('sub.ulasan');
    Route::post('/rating', [C_SubMateriEdukasi::class,'sendRating'])->name('sub.rating');
});

//Route Konsultasi
Route::get('/konsultasi', [C_Konsultasi::class,'konsultasi'])->name('konsultasi');
Route::post('/tambah-konsultasi', [C_Konsultasi::class,'sendKonsultasi'])->name('konsultasi.store')->middleware(['user']);     
Route::get('/balasan-konsultasi/{id}', [C_BalasanKonsultasi::class,'BalasanKonsultasi'])->name('balasan');
Route::post('/tambah-balasan-konsultasi', [C_BalasanKonsultasi::class,'sendDataKonsultasi'])->name('balasan.store')->withoutMiddleware(['admin']);

//Route Bahan Ajar
Route::get('/detail-bahan-ajar', [C_BahanAjar::class ,'bahanAjarDetail'])->name('detail-bahan-ajar')->middleware(['admin']);
Route::withoutMiddleware(['admin'])->group(function () {
    Route::get('/bahan-ajar', [C_BahanAjar::class , 'viewBahanAjar'])->name('bahan-ajar');
    Route::post('/tambah-bahan-ajar', [C_BahanAjar::class , 'ajukan'])->name('add.bahan-ajar');
    Route::get('/edit-bahan-ajar', [C_BahanAjar::class ,'LihatDetailAjuan'])->name('edit.bahan-ajar');
    Route::put('/edit-bahan-ajar/{id}', [C_BahanAjar::class , 'setLihatDetailAjuan'])->name('update.bahan-ajar');
});