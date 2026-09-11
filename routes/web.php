<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\pinjambukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', [PageController::class, 'beranda'])
    ->name('beranda');

Route::get('/profil', [PageController::class, 'profil'])
    ->name('profil');

Route::get('/mapel', [PageController::class, 'mapel'])
    ->name('mapel');

Route::get('/guru', [GuruController::class, 'guru'])
    ->name('guru');

Route::get('/fasilitas', [PageController::class, 'fasilitas'])
    ->name('fasilitas');

Route::get('/kontak', [PageController::class, 'kontak'])
    ->name('kontak');

Route::get('/prestasi', [PageController::class, 'prestasi'])
    ->name('prestasi');

Route::get('/galeri', [PageController::class, 'galeri'])
    ->name('galeri');

//Latihan
Route::get('/sapa/{nama}', [LatihanController::class, 'sapa']);
Route::get('/sapa/{nama}', function (string $nama) {
    return sapa($nama);
});

function sapa(string $nama): string
{
    return "Halo, " . $nama;
}


//Method
Route::get('/siswa', [LatihanController::class, 'sopo']);

//Multidimensional Array
Route::get('/daftar-siswa', [LatihanController::class, 'daftarSiswa']);
Route::get('/nama-siswa', [LatihanController::class, 'namaSiswa']);

//percabangan
Route::get('/cek-kelulusan', [LatihanController::class, 'cekKelulusan']);

//Percabangan pada Array
Route::get('/cek-stok', [LatihanController::class, 'cekStok']);

//Perulangan foreach dengan Nomor Urut
Route::get('/pinjam-buku', [pinjambukuController::class, 'pinjamBuku']);

Route::get('/daftar-menu', [LatihanController::class, 'daftarMenu']);
Route::get('/uji-menu', [LatihanController::class, 'ujiMenu']);

Route::get('/tampil-kendaraan', [LatihanController::class, 'tampilKendaraan']);
Route::get('/uji-kendaraan', [LatihanController::class, 'ujiKendaraan']);


Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/tersedia', [ProdukController::class, 'tersedia']);
Route::get('/produk/elektronik', [ProdukController::class, 'elektronik']);
Route::get('/produk/ringkasan', [ProdukController::class, 'ringkasan']);
