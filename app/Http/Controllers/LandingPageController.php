<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Mall;
use App\Poly;

class LandingPageController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::get();

        $kecamatan->map(function($q){
            $q['mall'] = 0;
            $q['poly'] = 0;
        });

        $mall = Mall::join('kelurahans as kel', 'mall.kelurahan_id', '=', 'kel.id')
                        ->join('kecamatans as kec', 'kel.kecamatan_id', '=', 'kec.id')
                        ->select('mall.nama', 'mall.alamat', 'mall.kontak', 'mall.jadwal', 'mall.jumlah', 'kec.id as kec_id', 'kel.id as kel_id', 'kec.nama as kec_nama', 'kel.nama as kel_nama', 'mall.lat', 'mall.lng')
                        ->get();

        $poly = Poly::join('kelurahans as kel', 'poly.kelurahan_id', '=', 'kel.id')
                        ->join('kecamatans as kec', 'kel.kecamatan_id', '=', 'kec.id')
                        ->select('poly.*', 'kec.id as kec_id', 'kel.id as kel_id', 'kec.nama as kec_nama', 'kel.nama as kel_nama')
                        ->get();

        //return $poly;
        return view('landing.home', [
            'mall' => $mall,
            'kecamatan' => $kecamatan,
            'poly' => $poly
        ]);
    }

}