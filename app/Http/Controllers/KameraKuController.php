<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamera;
use App\user;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Penyewa;
use App\Booking;


class KameraKuController extends Controller
{
    public function home()
    {
        $total_kamera = Kamera::count();
        $total_user = Penyewa::count(); 
        $booking_pending = Booking::where('status', 'pending')->count();
        $booking_active = Booking::where('status', 'disewa')->count();
        $recent_bookings = Booking::with('penyewa') 
                                ->orderBy('id', 'desc')
                                ->limit(5)
                                ->get();

        return view('home', [
            'key'             => 'home',
            'total_kamera'    => $total_kamera,
            'total_user'      => $total_user,
            'booking_pending' => $booking_pending,
            'booking_active'  => $booking_active,
            'recent_bookings' => $recent_bookings
        ]);
    }
    public function kamera() {
        $kamera = Kamera::orderBy('id', 'desc')->get();
        return view('kamera', ["key" => "kamera","kmr" => $kamera]);
    }
    public function kameraaddform() {
        return view("kameraaddform", ["key" => "kamera"]);
    }
    public function kamerasave(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $file_name = time().'-'.$request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambar', $file_name, 'public');
        } else {
            $file_name = null;
            $path = null;
        }

        Kamera::create([
            'nama' => $request->nama,
            'brand' => $request->brand,
            'type' => $request->type,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'gambar' => $file_name,
        ]);
        return redirect('/kamera')->with('alert', 'Data Berhasil disimpan!');
    }
    public function kameraeditform($id) {
        $kamera = Kamera::find($id);
        return view('kameraeditform', ["key" => "kamera", "k" => $kamera]);
    }
    public function kameraupdate($id, Request $request) {
        $kamera = Kamera::find($id);
        $kamera->nama = $request->nama;
        $kamera->brand = $request->brand;
        $kamera->type = $request->type;
        $kamera->deskripsi = $request->deskripsi;
        $kamera->harga = $request->harga;
        $kamera->stock = $request->stock;
        if($request->gambar)
        {
            if ($kamera->gambar)
            {
                Storage::disk('public')->delete('gambar/'.$kamera->gambar);
            }
            $file_name = time().'-'.$request->file('gambar')->getClientOriginalName();
            $path = $request->file('gambar')->storeAs('gambar', $file_name, 'public');
            $kamera->gambar = $file_name;
        }
        $kamera->save();
        return redirect('/kamera')->with('alert', 'Data Berhasil diupdate!');
    }
    public function kameradelete($id) {
        $kamera = Kamera::find($id);

        if($kamera->gambar)
        {
            Storage::disk('public')->delete('gambar/'.$kamera->gambar);
        }
        $kamera->delete();
        return redirect('/kamera')->with('alert', 'Data Berhasil dihapus!');
    }
    public function users() {
        $users = User::orderBy('id', 'desc')->get();
        return view('users', ["key" => "users", "km" => $users]);
    }
    public function usersaddform() {
        return view("usersaddform", ["key" => "users"]);
    }
    public function userssave(Request $request)
    {
        if ($request->hasFile('foto')) {
            $file_name = time().'-'.$request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('foto', $file_name, 'public');
        } else {
            $file_name = null;
            $path = null;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
            'foto' => $file_name,
        ]);
        return redirect('/users')->with('alert', 'Data Berhasil disimpan!');
    }
        public function usersdelete($id)
    {
        $user = User::find($id);

        if($user->foto)
        {
            Storage::disk('public')->delete('foto/'.$user->foto);
        }
        $user->delete();
        return redirect('/users')->with('alert', 'Data Berhasil dihapus!');
    }
    public function changepass()
    {
        return view( 'changepass',["key" => "users"]);
    }
    public function updatepass(Request $request) 
    {
        if ($request->passwordbaru !== $request->passwordkonfirmasi) {
            return redirect('/changepass')->with('alert', 'Konfirmasi password baru tidak cocok!');
        }

        $userId = Auth::id();

        User::where('id', $userId)->update([
            'password' => bcrypt($request->passwordbaru)
        ]);

    return redirect('/changepass')->with('alert', 'Password Berhasil diupdate!');
    }
    public function penyewa()
    {
        $data_penyewa = Penyewa::orderBy('id', 'desc')->get();
        return view('penyewa', ['penyewa' => $data_penyewa, 'key' => 'penyewa']);
    }

    public function penyewadelete($id)
    {
        $penyewa = Penyewa::find($id);
        
        if ($penyewa) {
            $penyewa->delete();
            return redirect('/penyewa')->with('alert', 'Data penyewa berhasil dihapus!');
        }
    }    
    
    public function booking()
    {
        $bookings = Booking::with(['penyewa', 'details.kamera'])->orderBy('id', 'desc')->get();

        return view('booking', ['bookings' => $bookings, 'key' => 'booking']);
    }

    public function bookingdelete($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->details()->delete();
            $booking->delete();
            return redirect('/booking')->with('alert', 'Data booking berhasil dihapus!');
        }
    }
}
