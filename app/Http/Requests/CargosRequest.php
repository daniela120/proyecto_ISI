<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargosRequest extends FormRequest
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
            'Cargo'=> ['required', 'string', 'min:3', 'max:50','regex:/^(?=[^A-Za-z]*[A-Za-z])(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'Descripcion' => ['required', 'string','min:5', 'max:110']
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
