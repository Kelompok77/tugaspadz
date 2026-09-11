<?php
// app/Services/ProdukService.php

namespace App\Services;

class ProdukService
{
    public function getAllProduk(): array
    {
        return [
            ["nama" => "Laptop Asus", "kategori" => "Elektronik", "harga" => 8500000, "stok" => 5],
            ["nama" => "Mouse Logitech", "kategori" => "Elektronik", "harga" => 150000, "stok" => 20],
            ["nama" => "Keyboard Mechanical", "kategori" => "Elektronik", "harga" => 450000, "stok" => 0],
            ["nama" => "Kemeja Flannel", "kategori" => "Fashion", "harga" => 120000, "stok" => 15],
            ["nama" => "Celana Jeans", "kategori" => "Fashion", "harga" => 200000, "stok" => 0],
            ["nama" => "Sepatu Sneakers", "kategori" => "Fashion", "harga" => 350000, "stok" => 8],
        ];
    }

    // Bonus 1: filter berdasarkan kategori
    public function getByKategori(string $kategori): array
    {
        $hasil = [];
        foreach ($this->getAllProduk() as $produk) {
            if ($produk['kategori'] === $kategori) {
                $hasil[] = $produk;
            }
        }
        return $hasil;
    }

    // Bonus 2: filter produk yang masih tersedia (stok > 0)
    public function getTersedia(): array
    {
        $hasil = [];
        foreach ($this->getAllProduk() as $produk) {
            if ($produk['stok'] > 0) {
                $hasil[] = $produk;
            }
        }
        return $hasil;
    }

    // Bonus 3: produk dengan harga di atas nilai tertentu
    public function getByHargaMinimal(float $hargaMin): array
    {
        $hasil = [];
        foreach ($this->getAllProduk() as $produk) {
            if ($produk['harga'] > $hargaMin) {
                $hasil[] = $produk;
            }
        }
        return $hasil;
    }

    // Bonus 4: jumlah seluruh produk
    public function getJumlahProduk(): int
    {
        return count($this->getAllProduk());
    }

    // Bonus 5: produk dengan stok paling banyak
    public function getStokTerbanyak(): array
    {
        $daftarProduk = $this->getAllProduk();
        $produkTerbanyak = $daftarProduk[0];

        foreach ($daftarProduk as $produk) {
            if ($produk['stok'] > $produkTerbanyak['stok']) {
                $produkTerbanyak = $produk;
            }
        }

        return $produkTerbanyak;
    }
}
