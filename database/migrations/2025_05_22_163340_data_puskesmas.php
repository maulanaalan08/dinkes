<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DataPuskesmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_puskesmas', function (Blueprint $table) {
            $table->bigIncrements('id_data_puskesmas');
            $table->string('nama');
            $table->string('kepala_puskesmas');
            $table->string('alamat');
            $table->string('no_telp');
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
        //
    }
}
