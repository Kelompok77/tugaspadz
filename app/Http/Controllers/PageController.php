<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function profil()
    {
        return view('profil');
    }

    public function mapel()
    {
        return view('mapel');
    }

    public function fasilitas()
    {
        return view('fasilitas');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function prestasi()
    {
        return view('prestasi');
    }

    public function galeri()
    {
        return view('galeri');
    }
}
