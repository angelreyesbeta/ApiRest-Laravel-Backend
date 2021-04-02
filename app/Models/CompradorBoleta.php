<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompradorBoleta extends Model
{
    //protected $fillable=["cantidad"];
    protected $fillable=["id_boleta","id_comprador","cantidad"];
   // protected $table ='comprador_boletas';

    public function comprador(){
        return $this->belongsTo('App\Models\Compradores', 'id_comprador');
    }
    public function boleta(){
        return $this->belongsTo('App\Models\Boleta', 'id_boleta');
    }
}
