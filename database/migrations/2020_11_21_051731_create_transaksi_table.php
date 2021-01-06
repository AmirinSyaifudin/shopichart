<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('transaksi_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->date('tanggal');
            $table->string('invoice');
            $table->string('nama_customer');
            $table->string('no_telpon');
            $table->integer('total_transaksi');
            $table->text('alamat');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer')
                ->onUpdate('CASCADE')
                ->unDelete('CASCADE');

            $table->foreign('kabupaten_id')->references('id')->on('kabupaten')
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
        Schema::dropIfExists('transaksi');
    }
}