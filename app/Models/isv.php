<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isv extends Model
{
    use HasFactory;
    protected $table = "isvs";

    protected $fillable = [

        'Descripcion',
        'isv'
        
    ];
}
