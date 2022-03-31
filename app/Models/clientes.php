<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
class clientes extends Model
{
    use HasFactory;

    protected $table = "clientes";

    protected $fillable = [

        'Nombre',
        'Apellido',
        'Usuario',
        'Direccion',
        'Telefono',
        'FechaNacimiento'
    ];

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }

}
