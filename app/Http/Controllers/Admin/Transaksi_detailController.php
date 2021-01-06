<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use App\Provinsi;
use App\Kota;
use App\Customer;
use App\Kabupaten;


use Illuminate\Support\Facades\DB;

class Transaksi_detailController extends Controller
{
    public function detail()
    {
        $transaksi_detail = DB::table('transaksi_detail')
            ->join('transaksi', 'transaksi_detail.transaksi_id', '=', 'transaksi.transaksi_id')
            ->join('produk', 'transaksi_detail.produk_id', '=', 'produk.produk_id')
            ->join('provinsi', 'transaksi_detail.provinsi_id', '=', 'provinsi.provinsi_id')
            ->join('kabupaten', 'transaksi_detail.kabupaten_id', '=', 'kabupaten.kabupaten_id')
            ->join('kota', 'transaksi_detail.kota_id', '=', 'kota.kota_id')
            ->select(
                'transaksi_detail.*',
                'transaksi_detail.nama',
                'transaksi_detail.no_telpon',
                'transaksi_detail.no_rekening',
                'transaksi_detail.transfer',
                'transaksi.transaksi_id',
                'transaksi.nama_transaksi',
                'produk.produk_id',
                'produk.nama_produk',
                'provinsi.provinsi_id',
                'provinsi.nama_provinsi',
                'kabupaten.kabupaten_id',
                'kabupaten.nama_kabupaten',
                'kota.kota_id',
                'kota.nama_kota'
            )
            ->orderBy('kode_invoice', 'ASC')
            ->get();

        //  dd($transaksi_detail);

        return view('admin.transaksi.detail', $transaksi_detail);

        // return view('admin.transaksi.detail_trs', $transaksi_detail);
    }




    public function transaksi_detail($transaksi_id)
    {
        // 'users.id',
        // 'users.name',
        // 'users.email',
        // ->join('users', 'transaksi_detail.user_id', '=', 'users.id')
        $transaksi_detail = DB::table('transaksi_detail')
            ->join('transaksi_detail', 'transaksi_detail.transaksi_id', '=', 'transaksi.transaksi_id')
            ->join('produk', 'transaksi_detail.produk_id', '=', 'produk.produk_id')
            ->join('kabupaten', 'transaksi_detail.kabupaten_id', '=', 'kabupaten.kabupaten_id')
            ->join('provinsi', 'transaksi_detail.provinsi_id', '=', 'provinsi.provinsi_id')
            ->join('kota', 'transaksi_detail.kota_id', '=', 'kota.kota_id')
            ->select(
                'transaksi_detail.*',
                'transaksi_detail.kode_invoice',
                'transaksi_detail.tanggal',
                'transaksi.transaksi_id',
                'transaksi.tanggal',
                'transaksi.nama',
                'transaksi.no_telpon',
                'transaksi.no_rekening',
                'transaksi.kode_pos',
                'transaksi.pengirim',
                'transaksi.transfer',
                'transaksi.keterangan',
                'produk.produk_id',
                'produk.nama_produk',
                'produk.qty',
                'produk.harga',
                'provinsi.provinsi_id',
                'provinsi.nama_provinsi',
                'kabupaten.kabupaten_id',
                'kabupaten.nama_kabupaten',
                'kota.kota_id',
                'kota.nama_kota'
            )
            ->where('transaksi_id', 4)
            // ->groupBy('produk.nama_produk')
            ->orderBy('id', 'ASC')
            ->get();
        // ->first();

        // ->get();
        // $transaksi = DB::table('transaksi')
        //     ->where('transaksi_id', $transaksi_id)
        //     ->first();

        $transaksi = DB::table('transaksi')
            ->get();

        $provinsi = DB::table('provinsi')
            ->get();
        $kabupaten = DB::table('kabupaten')
            ->get();
        $kota = DB::table('kota')
            ->get();
        $produk = DB::table('produk')
            ->get();

        $data = array(
            'transaksi_detail'  => $transaksi_detail,
            'transaksi'         => $transaksi,
            'provinsi'          => $provinsi,
            'kabupaten'         => $kabupaten,
            'kota'              => $kota,
            'produk'            => $produk
        );
        dd($data);

        return view('admin.transaksi.detail_trs', $data);
    }
}