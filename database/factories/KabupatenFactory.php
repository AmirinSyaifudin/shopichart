<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Kabupaten;
use App\provinsi;
use App\Kota;

use Faker\Generator as Faker;

$factory->define(Kabupaten::class, function (Faker $faker) {
    return [
        //
        'provinsi_id'       => Provinsi::inRandomOrder()->first()->id,
        'kota_id'           => Kota::inRandomOrder()->first()->id,
        'nama_kabupaten'    => $faker->cityPrefix
    ];
});