<?php

namespace App\Http\Controllers;

use App\Kamera;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function searchkamera() {
        $cameras = Kamera::orderBy('id', 'desc')->get();
        return view('searchkamera', ['cameras' => $cameras]);
    }
    public function actsearchkamera(Request $request) {
        $key = $request->cari;

        $kamera = Kamera::where('nama','like','%'. $key . '%')->get();

        return view('hasil',['data'=> $kamera]);
    }    
}