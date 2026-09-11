<?php

namespace App\Http\Controllers;


class Buku
{
    private string $kode;
    private string $judul;
    private string $penulis;
    private int $tahunTerbit;
    private bool $sedangDipinjam = false;

    public function __construct(string $kode, string $judul, string $penulis, int $tahunTerbit)
    {
        $this->kode = $kode;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
    }

    public function pinjam(): string
    {
        if ($this->sedangDipinjam === true) {
            return "Buku sedang dipinjam";
        }

        $this->sedangDipinjam = true;
        return "Buku berhasil dipinjam";
    }
}


class pinjambukuController extends Controller
{
    //Perulangan foreach dengan Nomor Urut - pinjam buku
    public function pinjamBuku()
    {
        $buku = new Buku("B001", "Kamus Mahfuzhat Santri", "zaid abdillah Al-fatih", 2023);

        $hasil = $buku->pinjam() . "<br>"; // percobaan pertama
        $hasil .= $buku->pinjam();          // percobaan kedua

        return $hasil;
        return $buku->pinjam();          // percobaan kedua
    }
}


