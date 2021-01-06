<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kabupaten;
use App\Provinsi;
use App\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kabupaten = DB::table('kabupaten')
            ->join('provinsi', 'kabupaten.provinsi_id', '=', 'provinsi.provinsi_id')
            ->join('kota', 'kabupaten.kota_id', '=', 'kota.kota_id')
            ->select(
                'kabupaten.*',
                'provinsi.provinsi_id',
                'provinsi.nama_provinsi',
                'kota.kota_id',
                'kota.nama_kota'
            )
            ->orderBy('nama_kabupaten', 'ASC')
            ->get();

        $provinsi = DB::table('provinsi')->get();
        $kota = DB::table('kota')->get();

        $data = array(
            'kabupaten'     => $kabupaten,
            'provinsi'      => $provinsi,
            'kota'          => $kota
        );

        return view('admin.kabupaten.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kabupaten = DB::table('kabupaten')
            ->join('provinsi', 'kabupaten.provinsi_id', '=', 'provinsi.provinsi_id')
            ->join('kota', 'kabupaten.kota_id', '=', 'kota.kota_id')
            ->select(
                'kabupaten.*',
                'provinsi.provinsi_id',
                'kota.kota_id',
                'nama_kabupaten'
            )
            ->get();

        $provinsi = DB::table('provinsi')->get();
        $kota = DB::table('kota')->get();

        $data = array(
            'kabupaten'     => $kabupaten,
            'provinsi'      => $provinsi,
            'kota'          => $kota
        );

        return view('admin.kabupaten.create', $data);
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
            'nama_kabupaten' => 'required|min:2',
            'kota_id'        => 'required',
            'provinsi_id'    => 'required'
        ]);

        DB::table('kabupaten')
            ->insert([
                'nama_kabupaten'  => $request->nama_kabupaten,
                'kota_id'           => $request->kota_id,
                'provinsi_id'       => $request->provinsi_id
            ]);

        return redirect('/admin/kabupaten')
            ->with('sukses', 'Data Berhasnil di tambahkan !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit($kabupaten_id)
    {
        //
        $kabupaten = DB::table('kabupaten')
            ->where('kabupaten_id', $kabupaten_id)
            ->first();

        $kota = DB::table('kota')
            ->get();
        $provinsi = DB::table('provinsi')
            ->get();

        $data = array(
            'kabupaten'   => $kabupaten,
            'kota'        => $kota,
            'provinsi'    => $provinsi
        );

        return view('admin.kabupaten.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //VALIDATION
        $this->validate($request, [
            'nama_kabupaten'    => 'required|min:2',
            'kota_id'           => 'required',
            'provinsi_id'       => 'required'
        ]);

        $edit = DB::table('kabupaten')
            ->where('kabupaten_id', $request->kabupaten_id)
            ->update([
                'nama_kabupaten'   => $request->nama_kabupaten,
                'kota_id'           => $request->kota_id,
                'provinsi_id'       => $request->provinsi_id
            ]);
        if ($edit) {
            return redirect('admin/kabupaten')
                ->with('sukses', 'Data Berhasil di Updata');
        } else {
            return redirect('admin/kabupaten')
                ->with('sukses', 'Error data gagal di Update Cuuu !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy($kabupaten_id)
    {
        //
        DB::table('kabupaten')->where('kabupaten_id', $kabupaten_id)->delete();

        return redirect('admin/kabupaten')->with(['sukses' => 'Data telah dihapus']);

        // if (Session()->get('username') == "") {
        //     return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        // }
        // DB::table('kabupaten')->where('id_kabupaten', $id_kabupaten)->delete();
        // return redirect('admin/kabupaten')->with(['sukses' => 'Data telah dihapus']);

        // DB::table('kabupaten')
        //     ->where('id', $id)
        //     ->delete();

        // return redirect('admin/kabupaten')->with('sukses', 'Data berhasil di hapus');

        // DB::table('kabupaten')->where('id', $id)->delete();

        // return redirect('admin/kabupaten')->with(['sukses' => 'Data telah dihapus']);



    }
}