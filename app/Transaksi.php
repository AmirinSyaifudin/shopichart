<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use App\Transaksi;


class Transaksi extends Model
{
    //
    public $guarded = [];

    public $table = 'transaksi';


    public function semua()
    {
        // $transaksi = DB::table('transaksi')
        // ->join('kabupaten', 'transaksi.kabupaten_id', '=', 'kabupaten.kabupaten_id')
        // ->join('provinsi', 'transaksi.provinsi_id', '=', 'provinsi.provinsi_id')
        // ->join('kota', 'transaksi.kota_id', '=', 'kota.kota_id')
        // ->join('customer', 'transaksi.customer_id', '=', 'customer.customer_id')
        // ->join('produk', 'transaksi.produk_id', '=', 'produk.produk_id')
        // ->join('users', 'transaksi.user_id', '=', 'users.id')
        // ->select(
        //     'transaksi.*',
        //     'transaksi.tanggal',
        //     'transaksi.invoice',
        //     'transaksi.nama_customer',
        //     'transaksi.no_telpon',
        //     'transaksi.alamat',
        //     'transaksi.total_transaksi',
        //     'transaksi.keterangan',
        //     'kabupaten.kabupaten_id',
        //     'kabupaten.nama_kabupaten',
        //     'provinsi.provinsi_id',
        //     'provinsi.nama_provinsi',
        //     'kota.kota_id',
        //     'kota.nama_kota',
        //     'customer.customer_id',
        //     'customer.nama_customer',
        //     'produk.produk_id',
        //     'produk.nama_produk',
        //     'users.id',
        //     'users.name'
        // )
        // ->get();

        $query = DB::table('transaksi')
            ->join('kabupaten', 'transaksi.kabupaten_id', '=', 'kabupaten.kabupaten_id')
            ->join('customer', 'transaksi.customer_id', '=', 'customer.customer_id')
            ->join('produk', 'transaksi.produk_id', '=', 'produk.produk_id')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.*',
                'transaksi.tanggal',
                'transaksi.invoice',
                'transaksi.nama_customer',
                'transaksi.no_telpon',
                'transaksi.alamat',
                'transaksi.total_transaksi',
                'transaksi.keterangan',
                'kabupaten.kabupaten_id',
                'kabupaten.nama_kabupaten',
                'kabupaten.provinsi_id',
                'kabupaten.kota_id',
                'customer.customer_id',
                'customer.nama_customer',
                'produk.produk_id',
                'produk.nama_produk',
                'users.id',
                'users.name'
            )
            ->get();


        return $query;
    }


    public function listing()
    {
        $query = DB::table('transaksi')
            ->join('kabupaten', 'transaksi.kabupaten_id', '=', 'kabupaten.kabupaten_id')
            ->join('produk', 'transaksi.produk_id', '=', 'produk.produk_id')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.*',
                'transaksi.tanggal',
                'transaksi.invoice',
                'transaksi.nama_customer',
                'transaksi.no_telpon',
                'transaksi.alamat',
                'transaksi.total_transaksi',
                'transaksi.keterangan',
                'kabupaten.kabupaten_id',
                'kabupaten.nama_kabupaten',
                'kabupaten.provinsi_id',
                'kabupaten.kota_id',
                'produk.produk_id',
                'produk.nama_produk',
                'users.id',
                'users.name'
            )
            ->get();


        return $query;
    }


    // public function status_pemesanan($status_pemesanan)
    // {
    //     $query = DB::table('pemesanan')
    //         ->join('produk', 'produk.id_produk', '=', 'pemesanan.id_produk','LEFT')
    //         ->select('pemesanan.*', 'produk.nama_produk', 'produk.harga_jual')
    //         ->where('pemesanan.status_pemesanan',$status_pemesanan)
    //         ->orderBy('id_produk','DESC')
    //         ->get();
    //     return $query;
    // }


    public function proses_transaksi(Request $request, $produk_id)
    {
        $query = DB::table('transaksi')
            ->join('kabupaten', 'transaksi.kabupaten_id', '=', 'kabupaten.kabupaten_id')
            ->join('customer', 'transaksi.customer_id', '=', 'customer.customer_id')
            ->join('produk', 'transaksi.produk_id', '=', 'produk.produk_id')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->select(
                'transaksi.*',
                'transaksi.tanggal',
                'transaksi.invoice',
                'transaksi.nama_customer',
                'transaksi.no_telpon',
                'transaksi.alamat',
                'transaksi.total_transaksi',
                'transaksi.keterangan',
                'kabupaten.kabupaten_id',
                'kabupaten.nama_kabupaten',
                'kabupaten.provinsi_id',
                'kabupaten.kota_id',
                'customer.customer_id',
                'customer.nama_customer',
                'produk.produk_id',
                'produk.nama_produk',
                'users.id',
                'users.name'
            )
            ->where('produk_id', $request->produk_id)
            ->order('produk_id', 'DESC')
            ->get();

        return $query;
    }
}