<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Kota;
use App\Provinsi;
use Faker\Generator as Faker;

$factory->define(Kota::class, function (Faker $faker) {
    return [
        //
        'provinsi_id'     => Provinsi::inRandomOrder()->first()->id,
        'nama_kota'       => $faker->city,
        'type'            => $faker->secondaryAddress,
        'kode_pos'        => $faker->postcode

    ];
});