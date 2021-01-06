<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Customer;
use App\User;
use App\Produk;
use App\Kabupaten;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {


    return [
        //
        'user_id'           => User::inRandomOrder()->first()->id,
        'produk_id'         => Produk::inRandomOrder()->first()->id,
        'kabupaten_id'      => Kabupaten::inRandomOrder()->first()->id, // mengambil data id
        'nama_customer'     => $faker->name,
        'jenis_kelamin'     => $faker->randomElement(['L', 'P']),
        'email'             => $faker->freeEmail,
        'no_telpon'         => $faker->tollFreePhoneNumber,
        'status'            => $faker->name,
        'alamat'            =>  $faker->address,
        'keterangan'        => $faker->text
    ];
});