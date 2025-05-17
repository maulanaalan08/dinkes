<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->bigIncrements('id_berita');
            $table->string('beranda')->nullable();
            $table->string('artikel')->nullable();
            $table->string('judul');
            $table->string('detail');
            $table->string('nama');
            $table->string('status')->nullable();
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
        Schema::drop('pengguna');
    }
}
