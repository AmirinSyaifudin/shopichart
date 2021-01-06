<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->string('nama_customer');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->string('no_telpon');
            $table->string('status');
            $table->text('alamat');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('CASCADE')
                ->unDelete('CASCADE');

            $table->foreign('produk_id')->references('id')->on('produk')
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
        Schema::dropIfExists('customer');
    }
}