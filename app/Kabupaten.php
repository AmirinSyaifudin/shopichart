<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kabupaten extends Model
{
    //
    public $guarded = [];

    public $table   = 'kabupaten';


    public function semua()
    {
        $query = DB::table('kabupaten')
            ->join('provinsi', 'kabupaten.provinsi_id', '=', 'provinsi.provinsi_id')
            ->join('kota', 'kabupaten.kota_id', '=', 'kota.kota_id')
            ->select(
                'kabupaten.*',
                'provinsi.provinsi_id',
                'provinsi.nama_provinsi',
                'kota.kota_id',
                'kota.nama_kota'
            )
            ->get();

        return $query;
    }
}