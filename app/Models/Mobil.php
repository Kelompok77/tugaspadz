<?php

namespace App\Models;

use App\Models\Kendaraan;

class Mobil extends Kendaraan
{
    protected float $biayaAsuransi;

    public function __construct(string $kode, string $merek, float $tarifPerHari, float $biayaAsuransi)
    {
        parent::__construct($kode, $merek, $tarifPerHari);

        if ($biayaAsuransi < 0) {
            $biayaAsuransi = 0;
        }

        $this->biayaAsuransi = $biayaAsuransi;
    }

    // Override: biaya mobil = (tarif x lama sewa) + asuransi
    public function hitungBiaya(int $lamaSewa): float
    {
        if ($lamaSewa <= 0) {
            return 0;
        }

        $biayaDasar = parent::hitungBiaya($lamaSewa);
        return $biayaDasar + $this->biayaAsuransi;
    }

    public function getData(): array
    {
        $data = parent::getData();
        $data['jenis'] = "Mobil";
        $data['biayaAsuransi'] = $this->biayaAsuransi;

        return $data;
    }
}
