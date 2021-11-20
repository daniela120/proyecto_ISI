<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoresRequest extends FormRequest
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
            'NombreCompañia' =>['required','string','max:255','min:3','regex:/^(?=[A-Z][a-z,á,é,í,ó,ú])(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'NombreContacto' =>['required','string','max:255','min:3','regex:/^(?=[A-Z][a-z,á,é,í,ó,ú])(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'Telefono' =>['required', 'digits:8'],
            'SitioWeb' =>['required','string','max:255','min:3', 'regex:/[\w._%+-]{3}+[\w.-]+\.[a-zA-Z]{2,4}/' ],
            'Direccion' =>['required', 'string', 'min:7']
        ];
    }

public function withValidator($validator)
    {
        $validator->after(function($validator) {
            if($validator->errors()->count()) {
                if(!in_array($this->method(), ['PUT'])) {
                    $validator->errors()->add('post', true);
                }
                
            }
        });
    }

    
    
}

