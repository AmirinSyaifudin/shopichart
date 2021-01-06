<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\DB;


class Provinsi extends Model
{
    //
    public $guarded = [];
    public $table   = 'provinsi';

    // public function semua()
    // {
    //     $query = DB::table('provinsi')
    //         ->select('provinsi.*')
    //         ->orderBy('provinsi_id', 'DESC')
    //         ->get();

    //     return $query;
    // }
}