<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Katagori;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $produk  = DB::table('produk')->get();
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
        return view('admin.produk.index', $data);
        //  return view('admin.produk.index', $produk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // QUEY BUILDER
        $produk = DB::table('produk')
            ->join('katagori', 'produk.produk_id', '=', 'katagori.katagori_id')
            ->select(
                'produk.produk_id',
                'produk.nama_produk',
                'produk.qty',
                'produk.harga',
                'produk.cover',
                'produk.keterangan',
                'katagori.katagori_id'
            )
            ->get();
        $katagori = DB::table('katagori')->get();
        $data = array(
            'produk'      => $produk,
            'katagori'    => $katagori,
        );
        //  dd($data);
        return view('admin.produk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Produk $produk)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_produk' => 'required|min:2',
            'katagori_id' => 'required',
            'qty'         => 'required|numeric',
            'harga'       => 'required|numeric',
            'cover'       => 'file|image',
            'keterangan'  => 'required',
        ]);

        // upload cover
        if ($request->cover) {
            $name = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/covers/'), $name);
        }

        DB::table('produk')->insert([
            'katagori_id'   => $request->katagori_id,
            'nama_produk'   => $request->nama_produk,
            'harga'         => $request->harga,
            'qty'           => $request->qty,
            'cover'         => $name,
            'keterangan'    => $request->keterangan,
            // 'katagori_id'   => $request->katagori_id
        ]);

        //  dd($request->all());
        return redirect('/admin/produk')
            ->with('sukses', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($produk_id)
    {
        $produk = DB::table('produk')
            ->where('produk_id', $produk_id)
            ->first();

        $katagori = DB::table('katagori')
            ->get();
        // $produk = DB::table('produk')->get();

        $data = array(
            'produk'        => $produk,
            'katagori'      => $katagori
        );

        return view('admin.produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //VALIDATION
        $this->validate($request, [
            'nama_produk' => 'required|min:2',
            'katagori_id' => 'required',
            'qty'         => 'required|numeric',
            'harga'       => 'required|numeric',
            'cover'       => 'file|image',
            'keterangan'  => 'required'
        ]);
        // //dd($request->all());
        //die();
        // DB::enableQueryLog();

        // upload cover
        if ($request->cover) {
            $name = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/covers/'), $name);
        }

        $edit = DB::table('produk')
            ->where('produk_id', $request->produk_id)
            ->update([
                'nama_produk'       => $request->nama_produk,
                'qty'               => $request->qty,
                'harga'             => $request->harga,
                'katagori_id'       => $request->katagori_id,
                'keterangan'        => $request->keterangan,
                'cover'             => $name,
            ]);
        // dd(DB::getQueryLog());
        // dd($edit);
        // exit();
        if ($edit) {
            return redirect('admin/produk')
                ->with('sukses', 'Data berhasil di Update !!!');
        } else {
            return redirect('admin/produk')
                ->with('error', 'error mbuh nopo !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($produk_id)
    {
        DB::table('produk')->where('produk_id', $produk_id)->delete();

        return redirect('admin/produk')->with(['sukses' => 'Data telah dihapus']);
    }


    public function detail($produk_id)
    {
        //
        $produk = DB::table('produk')
            ->where('produk_id', $produk_id)
            ->first();
        $katagori = DB::table('katagori')
            ->get();
        //  dd($produk);
        $data = array(
            'produk'        => $produk,
            'katagori'      => $katagori
        );

        return view('admin.produk.detail', $data);
    }
}


// function terbilang($x)
    // {
    //     $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

    //     if ($x < 12)
    //         return " " . $angka[$x];
    //     elseif ($x < 20)
    //         return terbilang($x - 10) . " belas";
    //     elseif ($x < 100)
    //         return terbilang($x / 10) . " puluh" . terbilang($x % 10);
    //     elseif ($x < 200)
    //         return "seratus" . terbilang($x - 100);
    //     elseif ($x < 1000)
    //         return terbilang($x / 100) . " ratus" . terbilang($x % 100);
    //     elseif ($x < 2000)
    //         return "seribu" . terbilang($x - 1000);
    //     elseif ($x < 1000000)
    //         return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
    //     elseif ($x < 1000000000)
    //         return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
    //     elseif ($x < 1000000000000)
    //         return terbilang($x / 1000000000) . "milyar" . terbilang($x % 1000000000);
    //     elseif ($x < 1000000000000000)
    //         return terbilang($x / 1000000000000) . "trilyun" . terbilang($x % 1000000000000);
    // }
