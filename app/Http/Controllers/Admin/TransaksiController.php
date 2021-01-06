<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Provinsi;
use App\Kota;
use App\Customer;
use App\Kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->join('produk', 'transaksi.produk_id', '=', 'produk.produk_id')
            ->select(
                'transaksi.*',
                'transaksi.nama',
                'transaksi.no_telpon',
                'transaksi.no_rekening',
                'transaksi.transfer',
                'users.id',
                'users.name',
                'produk.produk_id',
                'produk.nama_produk'
            )
            ->groupBy('users.name')
            ->orderBy('name', 'ASC')
            ->get();
        // $produk     = DB::table('produk')->get();
        $users      = DB::table('users')->get();

        $data = array(
            'transaksi'     => $transaksi,
            // 'produk'        => $produk,
            'users'         => $users
        );
        // dd($data);
        return view('admin.transaksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('transaksi')->where('id', $id)->delete();

        return redirect('/admin/transaksi')->with('sukses', 'Data Berhasil Di Hapus..');
    }

    public function transaksi_detail($transaksi_id)
    {
        // $transaksi = DB::table('transaksi')
        //     ->join('users', 'transaksi.user_id', '=', 'users.id')
        //     ->join('produk', 'transaksi.produk_id', '=', 'produk.produk_id')
        //     ->select(
        //         'transaksi.*',
        //         'transaksi.nama',
        //         'transaksi.no_telpon',
        //         'transaksi.no_rekening',
        //         'transaksi.transfer',
        //         'users.id',
        //         'users.name',
        //         'users.email',
        //         'produk.produk_id',
        //         'produk.nama_produk',
        //         'produk.qty',
        //         'produk.harga'
        //     )
        //     ->where('transaksi_id', 4)
        //     // ->groupBy('produk.nama_produk')
        //     ->orderBy('name', 'ASC')
        //     ->get();

        $transaksi_detail = DB::table('transaksi_detail')
            ->join('transaksi', 'transaksi_detail.transaksi_id', '=', 'transaksi.transaksi_id')
            ->join('produk', 'transaksi_detail.produk_id', '=', 'produk.produk_id')
            ->select(
                'transaksi_detail.*',
                'transaksi_detail.kode_invoice',
                'transaksi_detail.tanggal',
                'transaksi.transaksi_id',
                'transaksi.tanggal',
                'produk.produk_id',
                'produk.nama_produk',
                'produk.qty',
                'produk.harga'
            )
            // ->where('transaksi_id', 4)
            // ->where('name', 3)
            // ->groupBy('produk.nama_produk')
            ->orderBy('nama_produk', 'ASC')
            ->get();
        // dd($transaksi_detail);
        // ->get();
        // $transaksi = DB::table('transaksi')
        //     ->where('transaksi_id', $transaksi_id)
        //     ->first();

        $users = DB::table('users')
            ->where('users.id')
            // ->where('users.id', 3)
            ->first();
        // $kabupaten = DB::table('kabupaten')
        //     ->get();
        $data = array(
            'transaksi_detail'      => $transaksi_detail,
            // 'transaksi'             => $transaksi,
            'users'                 => $users
        );
        // dd($data);
        //  return view('admin.transaksi.detail', $data);
        return view('admin.transaksi.transaksi_detail', $data);
    }


    // public function transaksi_detail($transaksi_id)
    // {
    //     // 'users.id',
    //     // 'users.name',
    //     // 'users.email',
    //     // ->join('users', 'transaksi_detail.user_id', '=', 'users.id')
    //     $transaksi_detail = DB::table('transaksi_detail')
    //         ->join('transaksi_detail', 'transaksi_detail.transaksi_id', '=', 'transaksi.transaksi_id')
    //         ->join('produk', 'transaksi_detail.produk_id', '=', 'produk.produk_id')
    //         ->join('kabupaten', 'transaksi_detail.kabupaten_id', '=', 'kabupaten.kabupaten_id')
    //         ->join('provinsi', 'transaksi_detail.provinsi_id', '=', 'provinsi.provinsi_id')
    //         ->join('kota', 'transaksi_detail.kota_id', '=', 'kota.kota_id')
    //         ->select(
    //             'transaksi_detail.*',
    //             'transaksi_detail.kode_invoice',
    //             'transaksi_detail.tanggal',
    //             'transaksi.transaksi_id',
    //             'transaksi.tanggal',
    //             'transaksi.nama',
    //             'transaksi.no_telpon',
    //             'transaksi.no_rekening',
    //             'transaksi.kode_pos',
    //             'transaksi.pengirim',
    //             'transaksi.transfer',
    //             'transaksi.keterangan',
    //             'produk.produk_id',
    //             'produk.nama_produk',
    //             'produk.qty',
    //             'produk.harga',
    //             'provinsi.provinsi_id',
    //             'provinsi.nama_provinsi',
    //             'kabupaten.kabupaten_id',
    //             'kabupaten.nama_kabupaten',
    //             'kota.kota_id',
    //             'kota.nama_kota'
    //         )
    //         ->where('transaksi_id', 4)
    //         // ->groupBy('produk.nama_produk')
    //         ->orderBy('id', 'ASC')
    //         ->get();
    //     // ->first();

    //     // ->get();
    //     // $transaksi = DB::table('transaksi')
    //     //     ->where('transaksi_id', $transaksi_id)
    //     //     ->first();

    //     $transaksi = DB::table('transaksi')
    //         ->get();

    //     $provinsi = DB::table('provinsi')
    //         ->get();
    //     $kabupaten = DB::table('kabupaten')
    //         ->get();
    //     $kota = DB::table('kota')
    //         ->get();
    //     $produk = DB::table('produk')
    //         ->get();

    //     $data = array(
    //         'transaksi_detail'  => $transaksi_detail,
    //         'transaksi'         => $transaksi,
    //         'provinsi'          => $provinsi,
    //         'kabupaten'         => $kabupaten,
    //         'kota'              => $kota,
    //         'produk'            => $produk
    //     );
    //     dd($data);

    //     return view('admin.transaksi.detail_trs', $data);
    // }



    // public function detail($transaksi_id)
    // {
    //     $transaksi = DB::table('transaksi')
    //         ->join('users', 'transaksi.user_id', '=', 'users.id')
    //         ->join('produk', 'transaksi.produk_id', '=', 'produk.produk_id')
    //         ->select(
    //             'transaksi.*',
    //             'transaksi.nama',
    //             'transaksi.no_telpon',
    //             'transaksi.no_rekening',
    //             'transaksi.transfer',
    //             'users.id',
    //             'users.name',
    //             'users.email',
    //             'produk.produk_id',
    //             'produk.nama_produk',
    //             'produk.qty',
    //             'produk.harga'
    //         )
    //         ->where('transaksi_id', 4)
    //         // ->groupBy('produk.nama_produk')
    //         ->orderBy('name', 'ASC')
    //         // ->first();
    //         ->get();

    //     // ->get();
    //     // $transaksi = DB::table('transaksi')
    //     //     ->where('transaksi_id', $transaksi_id)
    //     //     ->first();
    //     // $kabupaten = DB::table('kabupaten')
    //     //     ->get();
    //     $data = array(
    //         'transaksi'         => $transaksi
    //         // 'transaksi_detail'  => $transaksi_detail,
    //         // 'kabupaten'         => $kabupaten
    //     );
    //     dd($data);
    //     return view('admin.transaksi.detail', $data);
    // }






















    // public function transaksi_detail()
    // {
    //     $transaksi_detail = DB::table('transaksi_detail')
    //         ->join('transaksi', 'transaksi_detail.transaksi_id', '=', 'transaksi.transaksi_id')
    //         ->join('produk', 'transaksi_detail.produk_id', '=', 'produk.produk_id')
    //         ->join('provinsi', 'transaksi_detail.provinsi_id', '=', 'provinsi.provinsi_id')
    //         ->join('kabupaten', 'transaksi_detail.kabupaten_id', '=', 'kabupaten.kabupaten_id')
    //         ->join('kota', 'transaksi_detail.kota_id', '=', 'kota.kota_id')
    //         ->select(
    //             'transaksi_detail.*',
    //             'transaksi_detail.nama',
    //             'transaksi_detail.no_telpon',
    //             'transaksi_detail.no_rekening',
    //             'transaksi_detail.transfer',
    //             'transaksi.transaksi_id',
    //             'transaksi.nama_transaksi',
    //             'produk.produk_id',
    //             'produk.nama_produk',
    //             'provinsi.provinsi_id',
    //             'provinsi.nama_provinsi',
    //             'kabupaten.kabupaten_id',
    //             'kabupaten.nama_kabupaten',
    //             'kota.kota_id',
    //             'kota.nama_kota'
    //         )
    //         ->orderBy('kode_invoice', 'ASC')
    //         ->get();

    //     return view('admin.transaksi.detail');
    // }
}



  // $transaksi = DB::table('transaksi')
        //     ->join('customer', 'transaksi.customer_id', '=', 'customer.customer_id')
        //     ->join('kabupaten', 'transaksi.kabupaten_id', '=', 'kabupaten.kabupaten_id')
        //     ->select(
        //         'transaksi.*',
        //         'customer.customer_id',
        //         'customer.nama_customer',
        //         'kabupaten.kabupaten_id',
        //         'kabupaten.nama_kabupaten'
        //     )
        //     ->get();

        // $customer = DB::table('customer')->get();
        // $kabupaten = DB::table('kabupaten')->get();

        // $data = array(
        //     'transaksi' => $transaksi,
        //     'customer' => $customer,
        //     'kabupaten' => $kabupaten
        // );

        // dd($transaksi);
