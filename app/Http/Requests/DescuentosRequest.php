<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescuentosRequest extends FormRequest
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
            'Descripcion'=>['required','string','max:255','min:3','regex:/^(?=[A-Z][a-z,á,é,í,ó,ú])(?:([\w\d*?!:; ])\1?(?!\1))+$/'],
            'ValorDescuento' =>['required','min:2', 'max:4', 'regex:/^[0][.][0-9]/']
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
