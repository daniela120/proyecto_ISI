<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallepedidos extends Model
{
    use HasFactory;

    protected $table = "detallepedidos";

  

    protected $fillable = [

      
        'id_pedido',
        'Id_Producto',
        'PrecioUnitario',
        'Cantidad',
        'id_descuento',	
        'id_isv',
        'Total'
        
    ];
}
