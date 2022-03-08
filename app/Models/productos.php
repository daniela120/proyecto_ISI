<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;
    protected $table = "productos";

    protected $fillable = [

        'NombreProducto',
        'Descripcion',
        'Categoria_id',
        'Precio'
        
    ];

    //public function categorias(){
      //  return $this-> hasOne(categorias::class);
    //}
    public function categorias(){
        return $this->belongsTo(categorias::class);
    }
    
}
