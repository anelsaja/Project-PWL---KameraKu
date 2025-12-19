<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarToKameraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kamera', function (Blueprint $table) {
            // Menambahkan kolom 'gambar' bertipe string
            // ->nullable() artinya boleh kosong (aman untuk data lama yang sudah ada)
            // ->after('stock') artinya kolom ini diletakkan setelah kolom stock
            $table->string('gambar')->nullable()->after('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kamera', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
}
