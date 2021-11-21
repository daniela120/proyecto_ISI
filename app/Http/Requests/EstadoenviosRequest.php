<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadoenviosRequest extends FormRequest
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
            'Nombre_Estado' =>['required',  'min:3', 'max:10', 'regex:/^(?=[^A-Za-z]*[A-Za-z])(?:([\w\d*?!:;])\1?(?!\1))+$/']
        ];
    }
}
