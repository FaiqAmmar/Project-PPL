<?php

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

//Route Public
Route::get('/', function () {
    return view('landing-page');
});

Route::get('/login-page', function () {
    return view('login-page');
});

Route::get('/register-page', function () {
    return view('register-page');
});

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

Route::get('/dashboard-modul-admin', function () {
    return view('admin.dashboard-modul-admin');
});

Route::get('/fitur-edukasi-admin', function () {
    return view('admin.fitur-edukasi-admin');
});