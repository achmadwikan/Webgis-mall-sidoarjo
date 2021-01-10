<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Kecamatan;
use Validator;

class KelurahanController extends Controller
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
        $data = Kelurahan::orderBy('nama', 'ASC')->get();

        return view('admin.kelurahan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   


    }

    /**
     * Display the specified resource.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kelurahan::where('id', $id)->first();
 
        return response()->json(["data" => $data]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {           
        
    }
}
