<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiposdepago extends Model
{
    use HasFactory;

    protected $table = "tiposdepagos";

    protected $fillable = [

        
        'Nombre_Tipo_Pago'
        
    ];
}

