<?php

namespace App\Exports;

use App\Models\EstadoEnvios;
use Maatwebsite\Excel\Concerns\FromCollection;

class EstadoEnviosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EstadoEnvios::all();
    }
}
