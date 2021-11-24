<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            
            'Nombre'=>['required', 'alpha', 'min:3', 'max:10', 'regex:/^(?=[^A-Za-z]*[A-Za-z])(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'Apellido'=>['required', 'alpha', 'min:3', 'max:10', 'regex:/^(?=[^A-Za-z]*[A-Za-z])(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'FechaNacimiento'=>['required', 'before: -18 year '],
            'FechaContratacion'=>['required','before: tomorrow','after: 01-01-2015' ],
            'Direccion'=>['required', 'string', 'min:7'],
            'Id_Cargo'=>['required'],
            'Id_Documento'=>['required'],
            'Id_Turno'=>['required'],
            'Id_Usuario'=>['required'],
            'Telefono'=>['required', 'digits:8'],
        
            'Documento' =>['required', 'string','min:13', 'max:20' ],



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



