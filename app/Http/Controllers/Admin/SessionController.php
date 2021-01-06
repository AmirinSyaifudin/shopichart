<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    //get, untuk menampilkan data di dalam session
    public function index(Request $request)
    {
        ///cek, apakah ada data di session atau tidak
        // $produk = DB::table('produk')->get();
        if ($request->session()->has('user')) {

            return $request->session()->get('user');
        } else {
            return 'Data tidak di temukan pada session';
        }
    }

    //put, untuk menambahkan data ke session
    public function store(Request $request)
    {
        // $produk = DB::table('produk')->get();
        $request->session()->put('user', 'Amir , Kebelet Nikah');

        return "Data user sudah di tambah dapa session";
    }

    //del, untuk menghapus data sesion
    public function delete(Request $request)
    {
        $request->session()->forget('user');

        return "Data sudah di hapus pada Session .";
    }

    //push, untuk menampilkan data session beserta formatnya
    public function push(Request $request)
    {
        // $produk = DB::table('produk')->get();
        if ($request->session()->exists('user')) {

            $request->session()->push('user.teams', ' Amir sy developers');

            return $request->session()->get('user');
        } else {

            return 'Data tidak ditemukan pada session';
        }
    }
}