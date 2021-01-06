<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->bigIncrements('kota_id');
            $table->unsignedBigInteger('provinsi_id');
            $table->string('nama_kota');
            $table->string('type');
            $table->string('kode_pos');
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on('provinsi')
                ->onUpdate('CASCADE')
                ->unDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kota');
    }
}