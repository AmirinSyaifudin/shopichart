<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = DB::table('provinsi')
            ->orderBy('nama_provinsi', 'ASC')
            ->get();

        return view('admin.provinsi.index', ['provinsi' => $provinsi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.provinsi.create');
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
        DB::table('provinsi')
            ->insert([
                'nama_provinsi' => $request->nama_provinsi,
            ]);

        return redirect('/admin/provinsi')
            ->with('sukses', 'Data Berhasil Di Tambahkan!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($provinsi_id)
    {
        $provinsi = DB::table('provinsi')
            ->where('provinsi_id', $provinsi_id)
            ->first();
        // dd($provinsi);
        return view('admin.provinsi.edit', [
            'provinsi', $provinsi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $provinsi_id)
    {
        $this->validate($request, [
            'nama_provinsi'     => 'required'
        ]);

        DB::table('provinsi')
            ->where('provinsi_id', $request->provinsi_id)
            ->update([
                'nama_provinsi' => $request->nama_provinsi
            ]);

        return redirect('/admin/provinsi')
            ->with('info', 'Data Berhasil Di Update!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($provinsi_id)
    {
        //
        DB::table('provinsi')
            ->where('provinsi_id', $provinsi_id)
            ->delete();

        return redirect('admin/provinsi')
            ->with(['info' => 'Data telah dihapus']);
    }
}