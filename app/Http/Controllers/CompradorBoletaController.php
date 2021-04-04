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
        /* $compradorBoletas=CompradorBoleta::create($request->all());
        return $compradorBoletas; */

        //Recoger datos por post
        $json=$request->input('json',null);
        $params=json_decode($json);
        $params_array=json_decode($json,true);

        //validacion
        $validate=\Validator::make($params_array,[
            'id_boleta' => 'required',
            'id_comprador' => 'required',
            'cantidad' => 'required'
            ]);
            
            if($validate->fails()){
                return response()->json($validate->errors(),400);
            }

            //Guardar el coche
            $reserva=new CompradorBoleta();
            $reserva->id_boleta=$params->id_boleta;
            $reserva->id_comprador=$params->id_comprador;
            $reserva->cantidad=$params->cantidad;
            
            $reserva->save();

            $data=array(
                'reserva'=>$reserva,
                'status'=>'success',
                'code'=>'200'
            ); 
         

            

                
    return response()->json($data,200);
        
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
