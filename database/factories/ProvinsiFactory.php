<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provinsi;
use Faker\Generator as Faker;

$factory->define(Provinsi::class, function (Faker $faker) {
    return [
        //
        'nama_provinsi'  => $faker->cityPrefix
    ];
});