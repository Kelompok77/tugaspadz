<?php

namespace App\Models;

class Kendaraan
{
    protected string $kode;
    protected string $merek;
    protected float $tarifPerHari;
    protected string $status;

    public function __construct(string $kode, string $merek, float $tarifPerHari)
    {
        if ($tarifPerHari < 0) {
            $tarifPerHari = 0;
        }

        $this->kode = $kode;
        $this->merek = $merek;
        $this->tarifPerHari = $tarifPerHari;
        $this->status = "Tersedia";
    }

    public function sewa(): string
    {
        if ($this->status === "Disewa") {
            return "{$this->merek} sedang disewa, tidak bisa disewa lagi";
        }

        $this->status = "Disewa";
        return "{$this->merek} berhasil disewa";
    }

    public function kembalikan(): string
    {
        if ($this->status === "Tersedia") {
            return "{$this->merek} belum disewa, tidak bisa dikembalikan";
        }

        $this->status = "Tersedia";
        return "{$this->merek} berhasil dikembalikan";
    }

    public function hitungBiaya(int $lamaSewa): float
    {
        if ($lamaSewa <= 0) {
            return 0;
        }

        return $this->tarifPerHari * $lamaSewa;
    }

    public function getData(): array
    {
        $kode = $this->kode;
        $merek = $this->merek;
        $tarifPerHari = $this->tarifPerHari;
        $status = $this->status;

        return compact('kode', 'merek', 'tarifPerHari', 'status');
    }
}
