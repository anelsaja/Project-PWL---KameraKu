<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $fillable = ['penyewa_id', 'tanggal_booking', 'tanggal_mulai', 'tanggal_selesai', 'total_harga', 'status'];

    public function penyewa()
    {
        return $this->belongsTo('App\Penyewa', 'penyewa_id');
    }

    public function details()
    {
        return $this->hasMany('App\BookingDetail', 'booking_id');
    }
}
