<?php

namespace App\Http\Controllers;

use App\Mall;
use Illuminate\Http\Request;
use App\Kelurahan;
use App\Kecamatan;
use Validator;
use Auth;
use DB;

class MallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mall::all();
		$kecamatan = Kecamatan::get();

        return view('admin.mall.index', compact('data', 'kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      	$kelurahan = Kelurahan::get()->pluck('nama', 'id');

        return view('admin.mall.create' , compact('kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();       
        if (count($request->latSearch) > 0) {
            $lat = $request->latSearch[count($request->latSearch) - 1];
            $lng = $request->lngSearch[count($request->lngSearch) - 1];
        }
        else if (count($request->latSearch) < 0){
            $lat = $request->latSearch[0];
            $lng = $request->lngSearch[0];
        }       

        $input_data = array(
            'nama'   =>  $request->nama,
            'kelurahan_id' => $request->kelurahan,
            'alamat'     => $request->alamat,
            'kontak'     => $request->kontak,
            'jadwal'     => $request->jadwal,
            'jumlah'     => $request->jumlah,
            'lat'  => $lat,
            'lng'  => $lng,
        );

        $data = Mall::create($input_data);
        // }  
        alert()->success('Anda berhasil menambahkan Data Mall.', 'Selamat');

        return redirect()->route('admin.mall.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mall::where('id', $id)->first();
 
        return response()->json(["data" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Mall::find($id);
        $kelurahan = Kelurahan::get()->pluck('nama', 'id');

        return view('admin.mall.edit', compact('data', 'kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();       
        if (count($request->latSearch) > 0) {
            $lat = $request->latSearch[count($request->latSearch) - 1];
            $lng = $request->lngSearch[count($request->lngSearch) - 1];
        }
        else if (count($request->latSearch) < 0){
            $lat = $request->latSearch[0];
            $lng = $request->lngSearch[0];
        }       

        $input_data = array(
            'nama'   =>  $request->nama,
            'kelurahan_id' => $request->kelurahan_id,
            'alamat'     => $request->alamat,
            'kontak'     => $request->kontak,
            'jadwal'     => $request->jadwal,
            'jumlah'     => $request->jumlah,
            'lat'  => $lat,
            'lng'  => $lng,
        );

        $data = Pasien::whereId($id)->update($input_data);
        
        alert()->success('Anda berhasil mengedit data Mall.', 'Selamat');
        return redirect()->route('admin.mall.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mall = Mall::find($id);
            $mall->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus Mall dengan nama judul '.$mall->nama
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus Data Mall'
            ]);
        }
    }
}
