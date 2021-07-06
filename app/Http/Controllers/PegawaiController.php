<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function pegawaiHome()
    {
        return view('pegawai.home');
    }
}
