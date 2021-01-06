<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produk;
use App\Transaksi;
use App\Kabupaten;
use App\Customer;

use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{
    //
    // public function index()
    // {
    //     $transaksi = DB::table('transaksi')
    //         ->join('kabupaten', 'transaksi.kabupaten_id', '=', 'kabupaten.kabupaten_id')
    //         ->join('customer', 'transaksi.customer_id', '=', 'customer.customer_id')
    //         ->join('produk', 'transaksi.produk_id', '=', 'produk.produk_id')
    //         ->join('users', 'transaksi.user_id', '=', 'users.id')
    //         ->select(
    //             'transaksi.*',
    //             'transaksi.tanggal',
    //             'transaksi.invoice',
    //             'transaksi.nama_customer',
    //             'transaksi.no_telpon',
    //             'transaksi.alamat',
    //             'transaksi.total_transaksi',
    //             'transaksi.keterangan',
    //             'kabupaten.kabupaten_id',
    //             'kabupaten.nama_kabupaten',
    //             'kabupaten.provinsi_id',
    //             'kabupaten.kota_id',
    //             'customer.customer_id',
    //             'customer.nama_customer',
    //             'produk.produk_id',
    //             'produk.nama_produk',
    //             'users.id',
    //             'users.name'
    //         )
    //         ->get();

    //     $kabupaten  = DB::table('kabupaten')->get();
    //     $customer   = DB::table('customer')->get();
    //     $produk     = DB::table('produk')->get();
    //     $users      = DB::table('users')->get();

    //     $data = array(
    //         'transaksi'     => $transaksi,
    //         'kabupaten'     => $kabupaten,
    //         'customer'      => $customer,
    //         'produk'        => $produk,
    //         'users'         => $users
    //     );
    //     return view('frontend.transaksi.index', $data);
    // }

    // public function index($produk_id)
    // {
    //     $produk = DB::table('produk')
    //         ->where('produk_id', $produk_id)
    //         ->first();
    //     $katagori   = DB::table('katagori')
    //         ->get();

    //     $data = array(
    //         'produk'        => $produk,
    //         'katagori'      => $katagori
    //     );

    //     return view('frontend.site.transaksi', $data);
    // }

    // public function transaksi($produk_id)
    // {
    //     $produk = DB::table('produk')
    //         ->where('produk_id', $produk_id)
    //         ->first();
    //     $katagori   = DB::table('katagori')
    //         ->get();

    //     $data = array(
    //         'produk'        => $produk,
    //         'katagori'      => $katagori
    //     );

    //     return view('frontend.site.transaksi', $data);
    // }
}