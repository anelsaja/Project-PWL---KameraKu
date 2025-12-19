<?php

namespace App\Http\Controllers;

use App\Kamera;
use Illuminate\Http\Request;

class KameraAPIController extends Controller
{
    public function apikamera() {
        $kamera = Kamera::orderby('id', 'desc')->get();
        return response()->json([
            'success'   => true,
            'message'   => "Berhasil ditampilkan",
            'data'      => $kamera
        ],200);
    }
}
