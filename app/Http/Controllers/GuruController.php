<?php

namespace App\Http\Controllers;

class GuruController extends Controller
{
    public function guru()
    {
        return $this->manggil();
    }
    private function manggil()
    {
        return view('guru');
    }


}

