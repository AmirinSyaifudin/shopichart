<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Katagori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class KatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $katagori = DB::table('katagori')
            ->orderBy('nama_katagori', 'ASC')
            ->get();
        // $katagori = DB::table('katagori')->join('produk','')
        return view('admin.katagori.index', ['katagori' => $katagori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admin.katagori.create', ['katagori' => $katagori]);
        return view('admin.katagori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDATION
        $this->validate($request, [
            'kode_katagori'     => 'required',
            'nama_katagori'     => 'required',
            'keterangan'        => 'required'
        ]);

        DB::table('katagori')
            ->insert([
                'kode_katagori' => $request->kode_katagori,
                'nama_katagori' => $request->nama_katagori,
                'keterangan'    => $request->keterangan,
            ]);

        return redirect('/admin/katagori')
            ->with('sukses', 'Data Berhasil Di Tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Katagori  $katagori
     * @return \Illuminate\Http\Response
     */
    public function show(Katagori $katagori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Katagori  $katagori
     * @return \Illuminate\Http\Response
     */
    public function edit($katagori_id)
    {
        $katagori = DB::table('katagori')
            ->where('katagori_id', $katagori_id)
            ->first();

        // dd($katagori);
        return view('admin.katagori.edit', [
            'katagori' => $katagori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Katagori  $katagori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $katagori_id)
    {
        //VALIDATION
        $this->validate($request, [
            'kode_katagori'     => 'required',
            'nama_katagori'     => 'required',
            'keterangan'        => 'required'
        ]);

        DB::table('katagori')
            ->where('katagori_id', $request->katagori_id)
            ->update([
                'kode_katagori' => $request->kode_katagori,
                'nama_katagori' => $request->nama_katagori,
                'keterangan'    => $request->keterangan
            ]);

        return redirect('/admin/katagori')
            ->with('info', 'Data Berhasil Di Update!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Katagori  $katagori
     * @return \Illuminate\Http\Response
     */
    public function destroy($katagori_id)
    {
        //
        DB::table('katagori')
            ->where('katagori_id', $katagori_id)
            ->delete();

        return redirect('admin/katagori')
            ->with(['info' => 'Data telah dihapus']);

        // return redirect('admin.katagori.index')->with('sukses', 'Data Berhasil Di Hapus..');
    }
}