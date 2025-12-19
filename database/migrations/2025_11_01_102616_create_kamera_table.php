<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKameraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamera', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('nama', 100); 
            $table->string('brand', 50); 
            $table->enum('type', ['Mirrorless', 'DSLR', 'Lensa', 'Aksesoris']); 
            $table->text('deskripsi');
            $table->Integer('harga'); 
            $table->Integer('stock'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamera');
    }
}
