<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    protected $primaryKey='id_pedido';

    protected $fillable = [

        'id_pedido',
        'id_empleado',
        'Fecha',
        'id_tipo_pago',
        'id_cliente'
        
    ];
}

