<?php

use App\Produk;
use App\Transaksi;
use App\Provinsi;
use App\Kabupaten;
use App\Kota;
use App\User;


function totalProduk()
{
    return Produk::count();
}

// function totalProduk()
// {
//     return Produk()->harga::count();
// }


function totalTransaksi()
{
    return Transaksi::count();
}

function totalProvinsi()
{
    return Provinsi::count();
}

function totalKabupaten()
{
    return Kabupaten::count();
}

function totalKota()
{
    return Kota::count();
}

function totalUser()
{
    return User::count();
}