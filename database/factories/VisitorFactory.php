<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visitor;
use Faker\Generator as Faker;
use \App\User;

$factory->define(Visitor::class, function (Faker $faker) {
    return [
        //
        'user_id' => User::inRandomOrder()->first()->id, // mengambil data author_id
        'nama'      => $faker->name,
        'meja'      => rand(10, 20),
        'lantai'    => rand(10, 20),
    ];
});