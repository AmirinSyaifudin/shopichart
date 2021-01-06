<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    //
    public $guarded = [];

    public $table   = 'produk';

    public function semua()
    {
        $query = DB::table('produk')
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
            ->orderBy('produk_id', 'DESC')
            ->get();

        return $query;
    }

    public function listing($katagori_id)
    {
        // ->where(array('produk.kategori_id'    => $kategori_id))
        $query = DB::table('produk')
            ->join('katagori', 'produk.katagori_id', '=', 'katagpri.katagori_id')
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
            // ->where(array('produk.katagori_id' => $katagori_id))
            ->orderBy('produk_id', 'DESC')
            ->get();
        return $query;
    }


    // public function detail($id_produk)
    // {
    //     $query = DB::table('produk')
    //         ->join('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk', 'LEFT')
    //         ->select('produk.*', 'kategori_produk.slug_kategori_produk', 'kategori_produk.nama_kategori_produk')
    //         ->where('produk.id_produk', $id_produk)
    //         ->orderBy('id_produk', 'DESC')
    //         ->first();
    //     return $query;
    // }


    public function detail($produk_id)
    {
        $query = DB::table('produk')
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
            ->where('produk_id', $produk_id)
            ->orderBy('produk_id', 'DESC')
            ->first();

        return $query;
    }
}