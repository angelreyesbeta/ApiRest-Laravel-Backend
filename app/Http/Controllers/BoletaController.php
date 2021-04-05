<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use Illuminate\Http\Request;

class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boletas=Boleta::orderBy('id','desc')->get();
        return $boletas;
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* $boleta=Boleta::create($request->all());
        return $boleta; */
    
      
            //Recoger datos por post
            $json=$request->input('json',null);
            $params=json_decode($json);
            $params_array=json_decode($json,true);
            //validacion
            $validate=\Validator::make($params_array,[
                'description' => 'required',
                'cantidad' => 'required'
                ]);
                
                if($validate->fails()){
                    return response()->json($validate->errors(),400);
                }

                //Guardar el coche
                $boleta=new Boleta();
                $boleta->description=$params->description;
                $boleta->cantidad=$params->cantidad;

                $isset_boleta=Boleta::where('description','=', $boleta->description)->first();
                if(is_null($isset_boleta)){

                    $boleta->save();
                    $data=array(
                        'boleta'=>$boleta,
                        'status'=>'success',
                        'code'=>'200'
                    ); 
                }else{
                    $data=array(
                        'status'=>'error',
                        'code'=>400,
                        'message'=>'Boleta duplicada, no puede registrarse'
                    ); 
                }

                

                    
        return response()->json($data,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function show(Boleta $boleta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function edit(Boleta $boleta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boleta $boleta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boleta  $boleta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boleta $boleta)
    {
        //
    }
}
