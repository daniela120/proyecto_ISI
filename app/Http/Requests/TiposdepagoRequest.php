<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TiposdepagoRequest extends FormRequest
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
            'Nombre_Tipo_Pago'=>['required','string','max:15','min:3','regex:/^(?=[^A-Za-z]*[A-Za-z])(?:([\w\d*?!:;])\1?(?!\1))+$/']
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

