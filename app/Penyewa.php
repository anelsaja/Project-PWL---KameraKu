<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewas';

    protected $fillable = ['nama_lengkap', 'no_identitas', 'no_hp', 'alamat',];
}
