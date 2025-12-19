<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamera extends Model
{
    protected $table = 'kamera';

    protected $fillable = ['nama','brand','type','deskripsi','harga','stock','gambar'];
}
