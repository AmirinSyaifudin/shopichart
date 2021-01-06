<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaksi;
use App\Customer;
use App\Kabupaten;
use App\Model;

use Faker\Generator as Faker;

$factory->define(Transaksi::class, function (Faker $faker) {
    return [
        //
        'customer_id'       => Customer::inRandomOrder()->first()->id,
        'kabupaten_id'      => Kabupaten::inRandomOrder()->first()->id,
        'tanggal'           => $faker->date($format = 'Y-m-d', $max = 'now'),
        'invoice'           => $faker->name,
        'nama_customer'     => $faker->name,
        'no_telpon'         => $faker->tollFreePhoneNumber,
        'total_transaksi'   => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'alamat'            => $faker->address,
        'keterangan'        => $faker->text
    ];
});