<?php

namespace App\Http\Controllers;

use App\Models\Compradores;
use Illuminate\Http\Request;

class CompradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compradores=Compradores::all();
        return $compradores;
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $comprador=Compradores::create($request->all());
        return $comprador; */

        
            //Recoger datos por post
            $json=$request->input('json',null);
            $params=json_decode($json);
            $params_array=json_decode($json,true);
            //validacion
            $validate=\Validator::make($params_array,[
                'name' => 'required',
                'identification' => 'required',
                'phone' => 'required'
                ]);
                
                if($validate->fails()){
                    return response()->json($validate->errors(),400);
                }

                //Guardar el coche
                $comprador=new Compradores();
                $comprador->name=$params->name;
                $comprador->identification=$params->identification;
                $comprador->phone=$params->phone;

                $isset_comprador_name=Compradores::where('name','=', $comprador->name)->first();
                $isset_comprador_id=Compradores::where('identification', '=', $comprador->identification)->first();
                if(is_null($isset_comprador_name) && is_null($isset_comprador_id)){

                    $comprador->save();
                    $data=array(
                        'comprador'=>$comprador,
                        'status'=>'success',
                        'code'=>'200'
                    ); 
                }else{
                    $data=array(
                        'status'=>'error',
                        'code'=>400,
                        'message'=>'Comprador duplicado, no puede registrarse'
                    ); 
                }

                

                    
        return response()->json($data,200);
    }
    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compradores  $compradores
     * @return \Illuminate\Http\Response
     */
    public function show(Compradores $compradores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compradores  $compradores
     * @return \Illuminate\Http\Response
     */
    public function edit(Compradores $compradores)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compradores  $compradores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compradores $compradores)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compradores  $compradores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compradores $compradores)
    {
        //
    }
}
