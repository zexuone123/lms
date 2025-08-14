<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function belajarAnak()
    {
        return view('belajar-anak');
    }

    public function matematika()
    {
        return view('belajar-anak.matematika');     
    }

    public function bahasa()
    {
        return view('belajar-anak.bahasa');
    }

    public function sains()
    {
        return view('belajar-anak.sains');
    }

    public function agama()
    {
        return view('belajar-anak.agama');
    }

    public function literasi()
    {
        return view('belajar-anak.literasi');
    }

    public function numerasi()
    {
        return view('belajar-anak.numerasi');
    }

    public function seni()
    {
        return view('belajar-anak.seni');
    }    

    public function jatiDiri()
    {
        return view('belajar-anak.jati-diri');
    }
}
