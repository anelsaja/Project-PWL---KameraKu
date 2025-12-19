<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Kamera;
use App\Penyewa;
use App\BookingDetail;

class BookingController extends Controller
{
    public function create($id)
    {
        $kamera = Kamera::find($id);

        if (!$kamera || $kamera->stock <= 0) {
            return redirect('/')->with('alert', 'Maaf, stok kamera ini sedang kosong.');
        }
        return view('booking_create', ['kamera' => $kamera]);
    }

    public function store(Request $request)
    {
        $kamera = Kamera::find($request->id_kamera);

        $detik_mulai   = strtotime($request->tanggal_mulai);
        $detik_selesai = strtotime($request->tanggal_selesai);
        $selisih_detik = $detik_selesai - $detik_mulai;
        
        $durasi = floor($selisih_detik / 86400);
        if ($durasi <= 0) $durasi = 1;

        $total_harga = $durasi * $kamera->harga;

        $penyewa = Penyewa::create([
            'nama_lengkap' => $request->nama_penyewa,
            'no_identitas' => $request->no_ktp,
            'no_hp'        => $request->no_hp,
            'alamat'       => $request->alamat,
        ]);

        $booking = Booking::create([
            'penyewa_id'      => $penyewa->id,
            'tanggal_booking' => date('Y-m-d'),
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_harga'     => $total_harga,
            'status'          => 'pending',
        ]);

        BookingDetail::create([
            'booking_id'     => $booking->id,
            'kamera_id'      => $kamera->id,
            'harga_per_hari' => $kamera->harga,
            'subtotal'       => $total_harga,
        ]);

        $kamera->stock = $kamera->stock - 1;
        $kamera->save();

        return redirect('/booking/sukses/' . $booking->id)
            ->with('alert', 'Booking Berhasil! Silakan tunggu konfirmasi admin.');
    }

    public function success($id)
    {
        $booking = Booking::with(['penyewa', 'details.kamera'])->find($id);
        return view('booking_success', ['booking' => $booking]);
    }

    public function cekPesanan(Request $request)
    {
        $booking = null;
        $message = null;

        if ($request->has('kode_booking')) {
            $kode = $request->kode_booking;
            
            $booking = Booking::with(['penyewa', 'details.kamera'])->find($kode);

            if (!$booking) {
                $message = 'Maaf, Kode Booking #' . $kode . ' tidak ditemukan.';
            }
        }

        return view('cek_pesanan', [
            'booking' => $booking,
            'message' => $message,
            'kode_input' => $request->kode_booking
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::find($id);

        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('alert', 'Status berhasil diperbarui menjadi: ' . ucfirst($request->status));
    }
}
