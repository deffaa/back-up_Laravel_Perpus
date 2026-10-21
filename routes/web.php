<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('index'); });
Route::get('/login', function () { return view('login'); });
Route::get('/dashboard', function () { return view('dashboard'); });
Route::get('/peminjaman', function () { return view('peminjaman'); });
Route::get('/katalog', function () { return view('katalog'); });
Route::get('/laporan', function () { return view('laporan'); });
Route::get('/pengaturan', function () { return view('pengaturan'); });