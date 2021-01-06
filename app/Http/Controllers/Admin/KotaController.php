<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kota;
use App\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kota = DB::table('kota')
            ->join('provinsi', 'kota.provinsi_id', '=', 'provinsi.provinsi_id')
            ->select(
                'kota.*',
                'kota.nama_kota',
                'kota.type',
                'kota.kode_pos',
                'provinsi.provinsi_id',
                'provinsi.nama_provinsi'
            )
            ->orderBy('nama_kota', 'ASC')
            ->get();

        $provinsi = DB::table('provinsi')->get();
        $data = array(
            'kota'          => $kota,
            'provinsi'      => $provinsi
        );
        // return view('admin.kota.index', ['kota' => $kota]);
        return view('admin.kota.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kota = DB::table('kota')
            ->join('provinsi', 'kota.provinsi_id', '=', 'provinsi.provinsi_id')
            ->select(
                'kota.*',
                'nama_kota',
                'type',
                'kode_pos',
                'provinsi.provinsi_id'
            )
            ->get();

        $provinsi = DB::table('provinsi')
            ->get();

        $data = array(
            'kota'          => $kota,
            'provinsi'      => $provinsi
        );

        return view('admin.kota.create', $data);
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
        $this->validate($request, [
            'nama_kota'     => 'required|min:2',
            'type'          => 'required',
            'kode_pos'      => 'required|numeric',
            'provinsi_id'   => 'required',
        ]);

        DB::table('kota')
            ->insert([
                'nama_kota'     => $request->nama_kota,
                'type'          => $request->type,
                'kode_pos'      => $request->kode_pos,
                'provinsi_id'   => $request->provinsi_id
            ]);

        return redirect('/admin/kota')
            ->with('sukses', 'Data berhasil di tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($kota_id)
    {
        //
        $kota = DB::table('kota')
            ->where('kota_id', $kota_id)
            ->first();

        $provinsi = DB::table('provinsi')
            ->get();

        $data = array(
            'kota'      => $kota,
            'provinsi'  => $provinsi
        );

        return view('admin.kota.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request, [
            'nama_kota'     => 'required|min:2',
            'provinsi_id'   => 'required',
            'type'          => 'required|numeric',
            'kode_pos'      => 'required|numeric'
        ]);

        $edit =  DB::table('kota')
            ->where('kota_id', $request->kota_id)
            ->update([
                'provinsi_id'   => $request->provinsi_id,
                'nama_kota'     => $request->nama_kota,
                'type'          => $request->type,
                'kode_pos'      => $request->kode_pos,
            ]);
        //  dd($request->all());

        if ($edit) {
            return redirect('admin/kota')
                ->with('sukses', 'Data Berhasil di Updata !!!');
        } else {
            return redirect('admin/kota')
                ->with('sukses', 'Data Error cuuuu !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($kota_id)
    {
        //
        DB::table('kota')
            ->where('kota_id', $kota_id)
            ->delete();

        return redirect('admin/kota')
            ->with(['sukses' => 'Data telah dihapus']);
    }
}