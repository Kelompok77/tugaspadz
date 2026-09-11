<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Menu;
use App\Models\MenuMinuman;
use App\Models\Mobil;
use App\Models\Motor;

class LatihanController extends Controller
{

    public function sapa(string $nama)
    {
        return $this->buatSapaan($nama);
    }

    private function buatSapaan(string $nama): string
    {
        return "Halo, " . $nama;
    }

    public function sopo()
    {
        $siswa = new Siswa();
        return $siswa->sopo();
    }

    //Multidimensional Array
    public function daftarSiswa()
    {
        $daftarSiswa = [
            ["nama" => "lesmana", "kelas" => "XII PPLG 1"],
            ["nama" => "Akane", "kelas" => "XII PPLG 2"],
        ];

        $hasil = "";
        foreach ($daftarSiswa as $siswa) {
            $hasil .= $siswa["nama"] . " : " . $siswa["kelas"] . "<br>";
        }

        return $hasil;
    }


    //
    public function namaSiswa()
    {
        $daftarSiswa = [
            ["nama" => "lesmana", "nis" => "1001", "kelas" => "XI PPLG 1", "nilai" => 85],
        ];

        $hasil = "";
        foreach ($daftarSiswa as $siswa) {
            $status = $siswa["nilai"] >= 75 ? "Lulus" : "Belum lulus";

            $hasil .= "Nama: " . $siswa["nama"] . "<br>";
            $hasil .= "NIS: " . $siswa["nis"] . "<br>";
            $hasil .= "Kelas: " . $siswa["kelas"] . "<br>";
            $hasil .= "Nilai: " . $siswa["nilai"] . "<br>";
            $hasil .= "Status: " . $status . "<br>";
            $hasil .= "<br>"; // jarak antar siswa
        }

        return $hasil;
    }


    //percabangan
    public function cekKelulusan()
    {
        $nilai = 85;

        if ($nilai >= 75) {
            return "Lulus";
        } else {
            return "Belum lulus";
        }
    }

    //Percabangan pada Array
    public function cekStok()
    {
        $buku = [
            "judul" => "Pemrograman PHP",
            "stok" => 0
        ];

        if ($buku["stok"] > 0) {
            return "Buku tersedia";
        } else {
            return "Buku sedang habis";
        }
    }

    //Perulangan foreach dengan Nomor Urut - pinjam buk



    public function daftarMenu()
    {
        // Buat 5 object menu
        $menu1 = new Menu("M001", "Nasi Goreng", 15000, "Makanan", 10);
        $menu2 = new Menu("M002", "Mie Ayam", 12000, "Makanan", 0);      // stok 0 → Habis
        $menu3 = new Menu("M003", "Kerupuk", 2000, "Cemilan", 20);
        $minuman1 = new MenuMinuman("M004", "Es Teh", 5000, 15, "Dingin");
        $minuman2 = new MenuMinuman("M005", "Kopi Panas", 8000, 8, "Panas");

        // Simpan semua object ke dalam array
        $daftarMenu = [$menu1, $menu2, $menu3, $minuman1, $minuman2];

        // Tampilkan menu, dikelompokkan per kategori
        $hasil = "";
        $kategoriList = ["Makanan", "Cemilan", "Minuman"];

        foreach ($kategoriList as $kategori) {
            $hasil .= "<h3>Kategori: {$kategori}</h3>";

            foreach ($daftarMenu as $menu) {
                $data = $menu->getData();

                if ($data['kategori'] === $kategori) {
                    $hasil .= $data['nama'] . " - Rp" . number_format($data['harga'])
                        . " - Stok: " . $data['stok']
                        . " - Status: " . $data['status'] . "<br>";
                }
            }
        }

        return $hasil;
    }

    public function ujiMenu()
    {
        $hasil = "";

        $nasiGoreng = new Menu("M001", "Nasi Goreng", 15000, "Makanan", 5);

        // Skenario 1: stok cukup
        $hasil .= "Skenario 1 (beli 2, stok 5): " . $nasiGoreng->kurangiStok(2) . "<br>";

        // Skenario 2: stok habis
        $mieAyam = new Menu("M002", "Mie Ayam", 12000, "Makanan", 0);
        $hasil .= "Skenario 2 (stok 0): " . $mieAyam->kurangiStok(1) . "<br>";

        // Skenario 3: pembelian melebihi stok
        $kerupuk = new Menu("M003", "Kerupuk", 2000, "Cemilan", 3);
        $hasil .= "Skenario 3 (beli 10, stok 3): " . $kerupuk->kurangiStok(10) . "<br>";

        // Bonus: hitung total harga
        $hasil .= "<br>Total harga 3x Nasi Goreng: Rp" . number_format($nasiGoreng->hitungTotalHarga(3));

        return $hasil;
    }

    public function daftarKendaraan()
    {
        // Buat beberapa object Mobil (tarif + asuransi beda-beda)
        $mobil1 = new Mobil("K001", "Avanza", 300000, 50000);
        $mobil2 = new Mobil("K002", "Innova", 500000, 75000);

        // Buat beberapa object Motor (tanpa asuransi, cuma 3 parameter)
        $motor1 = new Motor("K003", "Vario", 100000);
        $motor2 = new Motor("K004", "NMAX", 150000);
        $motor3 = new Motor("K005", "Beat", 80000);

        // Simpan semua ke dalam array
        $daftarKendaraan = [$mobil1, $mobil2, $motor1, $motor2, $motor3];

        return $daftarKendaraan; // sementara, nanti dipakai di method berikutnya
    }
    public function tampilKendaraan()
    {
        $mobil1 = new Mobil("K001", "Avanza", 300000, 50000);
        $mobil2 = new Mobil("K002", "Innova", 500000, 75000);
        $motor1 = new Motor("K003", "Vario", 100000);
        $motor2 = new Motor("K004", "NMAX", 150000);
        $motor3 = new Motor("K005", "Beat", 80000);

        // Sewa salah satu supaya ada yang statusnya "Disewa" (buat contoh filter)
        $motor1->sewa();

        $daftarKendaraan = [$mobil1, $mobil2, $motor1, $motor2, $motor3];

        $hasil = "<h3>Semua Kendaraan</h3>";
        foreach ($daftarKendaraan as $kendaraan) {
            $data = $kendaraan->getData();
            $hasil .= "{$data['jenis']} {$data['merek']} - Rp" . number_format($data['tarifPerHari'])
                . "/hari - Status: {$data['status']}<br>";
        }

        $hasil .= "<h3>Kendaraan Tersedia Saja</h3>";
        foreach ($daftarKendaraan as $kendaraan) {
            $data = $kendaraan->getData();

            if ($data['status'] === "Tersedia") {
                $hasil .= "{$data['jenis']} {$data['merek']} - Rp" . number_format($data['tarifPerHari']) . "/hari<br>";
            }
        }

        return $hasil;
    }

    public function ujiKendaraan()
    {
        $hasil = "";

        // Skenario 1: biaya mobil + asuransi
        $avanza = new Mobil("K001", "Avanza", 300000, 50000);
        $biayaAvanza = $avanza->hitungBiaya(3); // sewa 3 hari
        $hasil .= "Biaya sewa Avanza 3 hari (tarif 300rb + asuransi 50rb): Rp"
            . number_format($biayaAvanza) . "<br>";
        // (300000 x 3) + 50000 = 950000

        // Skenario 2: biaya motor (tanpa tambahan)
        $vario = new Motor("K003", "Vario", 100000);
        $biayaVario = $vario->hitungBiaya(2); // sewa 2 hari
        $hasil .= "Biaya sewa Vario 2 hari (tarif 100rb, tanpa tambahan): Rp"
            . number_format($biayaVario) . "<br><br>";
        // 100000 x 2 = 200000

        // Skenario 3: sewa ulang kendaraan yang sudah disewa
        $hasil .= "Percobaan sewa Avanza pertama: " . $avanza->sewa() . "<br>";
        $hasil .= "Percobaan sewa Avanza kedua (harusnya ditolak): " . $avanza->sewa() . "<br><br>";

        // Skenario 4: pengembalian
        $hasil .= "Kembalikan Avanza: " . $avanza->kembalikan() . "<br>";
        $hasil .= "Sewa lagi setelah dikembalikan (harusnya berhasil): " . $avanza->sewa() . "<br>";

        return $hasil;
    }
}

