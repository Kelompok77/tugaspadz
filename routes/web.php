<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('nav');
});

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/guru', function () {
    return view('guru');
});

Route::get('/mapel', function () {
    return view('mapel');
});
