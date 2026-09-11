<?php
// app/Http/Controllers/ProdukController.php

namespace App\Http\Controllers;

use App\Services\ProdukService;

class ProdukController extends Controller
{
    protected ProdukService $produkService;

    public function __construct(ProdukService $produkService)
    {
        $this->produkService = $produkService;
    }
        public function index()
    {
        $daftarProduk = $this->produkService->getAllProduk();

        return view('produk.index', compact('daftarProduk'));
    }

    // app/Http/Controllers/ProdukController.php
public function tersedia()
{
    $daftarProduk = $this->produkService->getTersedia();
    return view('produk.index', compact('daftarProduk'));
}

public function elektronik()
{
    $daftarProduk = $this->produkService->getByKategori('Elektronik');
    return view('produk.index', compact('daftarProduk'));
}

public function ringkasan()
{
    $jumlah = $this->produkService->getJumlahProduk();
    $terbanyak = $this->produkService->getStokTerbanyak();

    return "Jumlah produk: {$jumlah}<br>Stok terbanyak: {$terbanyak['nama']} ({$terbanyak['stok']} unit)";
}
}
