<?php

namespace App\Http\Controllers;

use App\Models\CompradorBoleta;
use Illuminate\Http\Request;

class CompradorBoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compradorBoletas=CompradorBoleta::all()->load('comprador','boleta');
        return response()->json(array(
            'reservas'=>$compradorBoletas,
            'status'=>'success'
        ),200) ;
        
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compradorBoletas=CompradorBoleta::create($request->all());
        return $compradorBoletas;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompradorBoleta  $compradorBoleta
     * @return \Illuminate\Http\Response
     */
    public function show(CompradorBoleta $compradorBoleta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompradorBoleta  $compradorBoleta
     * @return \Illuminate\Http\Response
     */
    public function edit(CompradorBoleta $compradorBoleta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompradorBoleta  $compradorBoleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompradorBoleta $compradorBoleta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompradorBoleta  $compradorBoleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompradorBoleta $compradorBoleta)
    {
        //
    }
}
