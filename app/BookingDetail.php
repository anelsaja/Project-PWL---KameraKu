<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $table = 'booking_details';
    protected $fillable = ['booking_id', 'kamera_id', 'harga_per_hari', 'subtotal'];

    public function kamera()
    {
        return $this->belongsTo('App\Kamera', 'kamera_id');
    }

    public function booking()
    {
        return $this->belongsTo('App\Booking', 'booking_id');
    }
}
