<?php

namespace App\Models;

class Menu
{
    private string $kode;
    private string $nama;
    protected float $harga;
    protected string $kategori;
    private int $stok;

    public function __construct(
        string $kode,
        string $nama,
        float $harga,
        string $kategori,
        int $stok
    ) {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
        $this->stok = $stok;
    }

    public function tambahStok(int $jumlah): string
    {
        if ($jumlah <= 0) {
            return "Jumlah tambah stok tidak valid";
        }

        $this->stok += $jumlah;
        return "Stok berhasil ditambah. Stok sekarang: " . $this->stok;
    }

    public function kurangiStok(int $jumlah): string
    {
        if ($jumlah <= 0) {
            return "Jumlah pembelian tidak valid";
        }

        if ($this->stok === 0) {
            return "Menu habis, tidak bisa dibeli";
        }

        if ($jumlah > $this->stok) {
            return "Pembelian melebihi stok yang tersedia (stok: {$this->stok})";
        }

        $this->stok -= $jumlah;
        return "Pembelian berhasil. Sisa stok: " . $this->stok;
    }

    public function hitungTotalHarga(int $jumlah): float
    {
        if ($jumlah <= 0) {
            return 0;
        }

        return $this->harga * $jumlah;
    }

    public function getData(): array
    {
        $kode = $this->kode;
        $nama = $this->nama;
        $harga = $this->harga;
        $kategori = $this->kategori;
        $stok = $this->stok;
        $status = $this->stok === 0 ? "Habis" : "Tersedia";

        return compact('kode', 'nama', 'harga', 'kategori', 'stok', 'status');
    }

}
