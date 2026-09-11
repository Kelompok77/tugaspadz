<?php

namespace App\Models;

use App\Models\Kendaraan;

class Motor extends Kendaraan
{
    // Motor tidak punya biaya tambahan apapun,
    // jadi tidak perlu override hitungBiaya() — otomatis pakai versi Kendaraan

    public function getData(): array
    {
        $data = parent::getData();
        $data['jenis'] = "Motor";

        return $data;
    }
}
