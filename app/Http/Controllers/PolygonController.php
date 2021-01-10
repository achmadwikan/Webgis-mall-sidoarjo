<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poly;
use App\Kelurahan;
use App\Kecamatan;
use Validator;

class PolygonController extends Controller
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
        
        $data = Poly::get();
        $kecamatan = Kecamatan::get();

        return view('admin.poly.index', compact('data', 'kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$kelurahan = Kelurahan::get()->pluck('nama', 'id');

        return view('admin.poly.create' , compact('kelurahan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if (count($request->poly) > 1) {
            foreach ($request->poly as $key => $poly) {
                $input_data = array(
                    'nama'   =>  $request->nama,
                    'keterangan' => $request->keterangan,
                    'polyline'    => $request->poly,
                    'kelurahan_id'     => $request->kelurahan,
                );

                $distance = Poly::create($input_data);
            }

            $kelurahan = Kelurahan::select('nama')->where('id', $request->kelurahan)->first()->nama;

            alert()->success('Sebanyak '.count($request->poly).' Data Polygon, untuk Kelurahan ' .$kelurahan. ' Berhasil Ditambahkan.', 'Selamat');

        	return redirect()->route('admin.polygon.index');
            //$poly = $request->poly[count($request->poly) - 1];
        }
        else{
            $input_data = array(
                'nama'   =>  $request->nama,
                'keterangan' => $request->keterangan,
                'polyline'    => $request->poly[0],
                'kelurahan_id'     => $request->kelurahan,
            );

            $distance = Poly::create($input_data);

            $kelurahan = Kelurahan::select('nama')->where('id', $request->kelurahan)->first()->nama;

            alert()->success('Data Polygon, untuk Kelurahan ' .$kelurahan. ' Berhasil Ditambahkan.', 'Selamat');

        	return redirect()->route('admin.polygon.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Poly::where('id', $id)->first();

            $poly = Poly::select('polyline')->where('id', $id)->first()->polyline;
            $ex = explode (",", $poly);
            $count = count($ex)-1;

            for ($x = 0; $x <= $count; $x+=2) {
               $distance2[] = array(
                    -$ex[$x],
                    +$ex[$x+1]
               );
            }
 
        return response()->json(["data" => $data, "distance" => $distance2]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Poly::find($id);
        $kelurahan = Kelurahan::get()->pluck('nama', 'id');

        return view('admin.poly.edit', compact('data', 'kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $input_data = array(
            'nama'   =>  $request->nama,
            'keterangan' => $request->keterangan,
            'kelurahan_id'     => $request->kelurahan,
        );

        $distance = Poly::whereId($id)->update($input_data);

        $kelurahan = Kelurahan::select('nama')->where('id', $request->kelurahan)->first()->nama;

        alert()->success('Data Polygon, untuk Kelurahan ' .$kelurahan. ' Berhasil Diedit.', 'Selamat');

    	return redirect()->route('admin.polygon.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {           
        try {
            $poly = Poly::find($id);
            $poly->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus Mall dengan nama judul '.$poly->nama
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus Data Mall'
            ]);
        }
    }
}
