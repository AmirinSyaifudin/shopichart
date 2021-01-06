<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Drink;
use Faker\Generator as Faker;

$factory->define(Drink::class, function (Faker $faker) {

    $randomNumber = rand(1, 100);
    $cover = "https://picsum.photos/seed/{$randomNumber}/200/300";

    return [
        //
        'nama'      => $faker->name,
        'harga'     => $faker->name,
        'cover'     => $cover,
        'qty'       => rand(10, 20)
    ];
});