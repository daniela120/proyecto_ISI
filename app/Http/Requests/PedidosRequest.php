<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
        'id_empleado'=>['required'],
        'Fecha'=>['required'],
        'id_tipo_de_pago'=>['required'],
        'id_cliente'=>['required'],
        'Id_Producto'=>['required'],
        'PrecioUnitario'=>['required'],
        'Cantidad'=>['required'],
        'id_descuento'=>['required'],
        'id_isv'=>['required'],
        
        ];
    }
}
