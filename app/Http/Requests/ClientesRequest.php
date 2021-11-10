<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            //
            'Nombre' =>['required', 'alpha', 'min:3', 'max:10', 'regex:/^[A-Z][a-z,á,é,í,ó,ú]+$/'],
            'Apellido' =>['required', 'alpha', 'min:3', 'max:10' , 'regex:/^[A-Z][a-z,á,é,í,ó,ú]+$/'],
            'Usuario' =>['required', 'string','min:5', 'max:15' ],
            'Correo' =>['required', 'string', 'email','regex:/^ '],
            'Contraseña' =>['required', 'string', 'regex:/^"[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*"'],
            'Direccion' =>['required', 'string', 'min:7'],
            'Telefono' =>['required', 'digits:8'],
            'FechaNacimiento' =>['required', 'date', ]
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator){
            if($validator->errors()->count()){
                if(!in_array($this->method(),['PUT','PATCH'])) {
                    $validator->errors()->add('post', true);
                }
            }
        });
    }
}
