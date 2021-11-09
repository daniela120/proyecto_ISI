<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargoempleados extends Model
{
    use HasFactory;

    protected $table = "cargoempleados";

    protected $fillable = [

        'Cargo',
        'Descripcion'

    ];
}
