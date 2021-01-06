<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Produk;
use App\Katagori;
use Faker\Generator as Faker;

$factory->define(Produk::class, function (Faker $faker) {

    $randomNumber = rand(1, 100);
    $cover = "https://picsum.photos/seed/{$randomNumber}/200/300";

    return [
        //
        'katagori_id'       => Katagori::inRandomOrder()->first()->id, // mengambil data id
        'nama_produk'       => $faker->name,
        'harga'             => $faker->buildingNumber,
        'qty'               => rand(10, 20),
        'cover'             => $cover,
        'keterangan'        => $faker->text
    ];
});