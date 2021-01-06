<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\Produk;
use Illuminate\Support\Facades\DB;


class LaporanController extends Controller
{
    public function topproduk()
    {
        $produk = DB::table('produk')
            ->join('katagori', 'produk.katagori_id', '=', 'katagori.katagori_id')
            ->select(
                'produk.*',
                'produk.nama_produk',
                'produk.qty',
                'produk.harga',
                'produk.keterangan',
                'produk.cover',
                'katagori.katagori_id',
                'katagori.nama_katagori'
            )
            ->orderBy('nama_produk', 'ASC')
            ->get();
        // dd($produk);
        $katagori = DB::table('katagori')->get();
        // dd($produk);
        $data = array(
            'produk'     => $produk,
            'katagori'   => $katagori
        );
        return view('admin.laporan.top-produk', $data);
    }

    public function topuser()
    {
        // memanggil relasi di model User.php
        //  $users = User::withcount('borrow')
        //  ->orderBy('borrow_count', 'desc')
        //  ->paginate(10);

        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.*',
                'transaksi.no_rekening',
                'transaksi.transfer',
                'users.id',
                'users.name',
                'users.email',
                'users.created_at'
            )
            ->groupBy('users.name')
            ->orderBy('name', 'ASC')
            ->get();
        $users      = DB::table('users')->get();

        $data = array(
            'transaksi'     => $transaksi,
            'users'         => $users
        );
        // dd($data);
        return view('admin.laporan.top-user', $data);
        // return view('admin.transaksi.index', $data);


        // $user = DB::table('users')
        //     ->select(
        //         'users.*',
        //         'users.id',
        //         'users.name',
        //         'users.email'
        //     )
        //     ->orderBy('name', 'ASC')
        //     ->get();
        // // dd($user);
        // $transaksi = DB::table('transaksi')->get();

        // $data = array(
        //     'user'          => $user,
        //     'transaksi'     => $transaksi
        // );
        // //  dd($data);
        // return view('admin.laporan.top-user', $data);
    }


    public function produkmahal()
    {
        $produk = DB::table('produk')
            ->select(
                'produk.nama_produk',
                'produk.qty',
                'produk.harga'
            )
            ->orderBy('harga', 'DESC')
            ->get();
        // dd($produk);
        $data = array(
            'produk'     => $produk,
        );
        return view('admin.laporan.produkmahal', $data);
    }

    public function produkmurah()
    {
        $produk = DB::table('produk')
            ->select(
                'produk.nama_produk',
                'produk.qty',
                'produk.harga'
            )
            ->orderBy('harga', 'ASC')
            ->get();
        // dd($produk);
        $data = array(
            'produk'     => $produk,
        );
        return view('admin.laporan.produkmurah', $data);
    }
}