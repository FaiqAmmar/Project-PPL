<?php

use App\Http\Controllers\C_BahanAjar;
use App\Http\Controllers\C_JenisEdukasi;
use App\Http\Controllers\C_EdukasiGov;
use App\Http\Controllers\C_EdukasiUser;
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
Route::post('/tambah-modul', [C_Modul::class , 'nambah_modul'])->name('add.modul')->middleware(['gov']);
Route::put('/edit-modul/{id}', [C_Modul::class , 'update_modul'])->name('update.modul')->middleware(['admin']);

//Route Edukasi
//Admin
Route::put('admin/edukasi/materi/{id}', [C_MateriEdukasi::class, 'update'])->name('admin.materi.edit');
Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {
    Route::group(['prefix' => 'edukasi', 'as' => 'edukasi.'], function () {
        Route::post('jenis-edukasi', [C_JenisEdukasi::class, 'store'])->name('jenis.store');
        Route::post('materi-edukasi', [C_MateriEdukasi::class, 'store'])->name('materi.store');
        Route::post('subMateri', [C_SubMateriEdukasi::class,'store'])->name('sub');
        Route::get('{id}', [C_MateriEdukasi::class, 'index'])->name('materi.index');
        Route::get('{materi_id}/{sub_id}', [C_MateriEdukasi::class, 'show'])->name('materi.show');         
        Route::put('{id}/update', [C_SubMateriEdukasi::class, 'update'])->name('sub.edit');
        Route::get('/',[C_JenisEdukasi::class, 'index'])->name('index')->middleware('admin');       
        Route::resource('sub-materi-edukasi', 'SubMateriEdukasi');        
    });
});
//Gov
Route::group(['prefix' => 'gov' ,'as' =>'gov.'],function (){
    Route::group(['prefix'=> 'edukasi','as'=> 'edukasi.'], function () {
        Route::get('/', [C_EdukasiGov::class, 'index'])->name('index');
        Route::get('{id}', [C_EdukasiGov::class, 'materi'])->name('materi.index');
        Route::get('{materi_id}/{sub_id}', [C_EdukasiGov::class, 'show'])->name('materi.show');
        Route::post('ulasan/{id}', [C_EdukasiGov::class, 'ulasan'])->name('ulasan');
        Route::post('rating/{id}', [C_EdukasiGov::class, 'rating'])->name('rating');
        Route::post('materi-edukasi', [C_EdukasiGov::class, 'store'])->name('materi.store');
        Route::post('subMateri', [C_EdukasiGov::class,'subMateri'])->name('sub');
    });
});
//User
Route::group(['prefix'=> 'user','as'=> 'user.'], function () {
    Route::group(['prefix'=> 'edukasi','as'=> 'edukasi.'], function () {
        Route::get('/', [C_EdukasiUser::class, 'index'])->name('index');
        Route::get('{id}', [C_EdukasiUser::class, 'materi'])->name('materi.index');
        Route::get('{materi_id}/{sub_id}', [C_EdukasiUser::class, 'show'])->name('materi.show');
        Route::post('ulasan/{id}', [C_EdukasiUser::class, 'ulasan'])->name('ulasan');
        Route::post('rating/{id}', [C_EdukasiUser::class, 'rating'])->name('rating');   
    });
});

//Route Konsultasi
Route::get('/konsultasi', [C_Konsultasi::class,'index'])->name('konsultasi');

//Route Bahan Ajar
Route::get('/detail-bahan-ajar', [C_BahanAjar::class ,'view_detail_bahan_ajar'])->name('detail-bahan-ajar')->middleware(['admin']);
Route::withoutMiddleware(['admin'])->group(function () {
    Route::get('/bahan-ajar', [C_BahanAjar::class , 'index'])->name('bahan-ajar');
    Route::post('/tambah-bahan-ajar', [C_BahanAjar::class , 'create_bahan_ajar'])->name('add.bahan-ajar');
    Route::get('/edit-bahan-ajar', [C_BahanAjar::class ,'edit_bahan_ajar'])->name('edit.bahan-ajar');
    Route::put('/edit-bahan-ajar/{id}', [C_BahanAjar::class , 'update_bahan_ajar'])->name('update.bahan-ajar');
});