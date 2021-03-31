<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompradorBoleta extends Model
{
    protected $fillable=["id_boleta","id_comprador","cantidad"];
}
