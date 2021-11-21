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
            'Nombre_Estado' =>['required','string','max:25','min:3','regex:/^(?=[A-Z ][ a-z,á,é,í,ó,ú ])(?:([ \w\d*?!:; ])\1?(?!\1))+$/']
        ];
    }
}
