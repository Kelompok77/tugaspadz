<?php

namespace App\Models;

class MenuMinuman extends Menu
{
    private string $suhu; // "Panas" atau "Dingin"

    public function __construct(string $kode, string $nama, float $harga, int $stok, string $suhu)
    {
        // Panggil constructor class induk (Menu), kategori otomatis "Minuman"
        parent::__construct($kode, $nama, $harga, "Minuman", $stok);

        $this->suhu = $suhu;
    }

    public function getData(): array
    {
        $dataMenu = parent::getData(); // ambil data dari Menu dulu
        $dataMenu['suhu'] = $this->suhu; // tambahin info suhu

        return $dataMenu;
    }
}
