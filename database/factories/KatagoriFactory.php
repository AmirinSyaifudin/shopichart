<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Katagori;
use Faker\Generator as Faker;

$factory->define(Katagori::class, function (Faker $faker) {
    return [
        //
        'kode_katagori'     => $faker->name,
        'nama_katagori'     => $faker->name,
        'keterangan'        => $faker->text
    ];
});