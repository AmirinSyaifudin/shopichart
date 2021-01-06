<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksidetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksidetail', function (Blueprint $table) {
            $table->bigIncrements('transaksidetail_id');
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('produk_id');
            $table->integer('harga');
            $table->integer('qty');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('transaksi_id')->references('id')->on('transaksi')
                ->onUpdate('CASCADE')
                ->unDelete('CASCADE');

            $table->foreign('produk_id')->references('id')->on('produk')
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
        Schema::dropIfExists('transaksidetail');
    }
}