<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    

    protected $fillable = [

        'id_pedido',
        'id_empleado',
        'Fecha',
        'id_tipo_de_pago',
        'id_cliente',
        'created_at',
        'updated_at'
        
        
    ];
}

