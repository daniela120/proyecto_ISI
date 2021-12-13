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
        //var_dump($this);
        
        $rule = 
        [
            //
            
            'Nombre'=>['required', 'alpha', 'min:3', 'max:10', 'regex:/^(?=[^A-Za-z]*[A-Za-z])(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'Apellido'=>['required', 'alpha', 'min:3', 'max:10', 'regex:/^(?=[^A-Za-z]*[A-Za-z])(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'FechaNacimiento'=>['required', 'before: -18 years '],
            'FechaContratacion'=>['required','before: tomorrow','after: 01-01-2015' ],
            'Direccion'=>['required', 'string', 'min:7'],
            'Id_Cargo'=>['required'],
            'Id_Documento'=>['required'],
            'Id_Turno'=>['required'],
            'Id_Usuario'=>['required'],
            'Telefono'=>['required', 'digits:8'],
        
            'Documento' => $this['Id_Documento'] == '2' ? 'required|digits:13' : 'required|digits:14'


        ];        
        return $rule;
    }

    function val($request){
        if($request->input('Id_Documento')-> value == '1'){
            $Campos=[
                'Documento' => 'required', 'digits:14'
            ];
            $mensaje=[
                
            ];
        }else{
            $Campos=[
                'Documento' => 'required', 'digits:13'
            ];
            $mensaje=[

            ];
        }
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



