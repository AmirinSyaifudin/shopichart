<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('produk_id');
            $table->unsignedBigInteger('katagori_id');
            $table->string('nama_produk');
            $table->string('gambar')->nullable()->default(null);
            $table->integer('harga');
            $table->integer('qty');
            $table->string('keterangan');
            $table->timestamps();


            $table->foreign('katagori_id')->references('id')->on('katagori')
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
        Schema::dropIfExists('produk');
    }
}