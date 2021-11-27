<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallepedidos extends Model
{
    use HasFactory;

    protected $table = "detallepedidos";

    protected $primaryKey='id_pedido';

    protected $fillable = [

        'id_detallepedido',
        'id_pedido',
        'id_producto',
        'Cantidad',
        'descuento',	
        'Total_producto'
        
    ];
}
