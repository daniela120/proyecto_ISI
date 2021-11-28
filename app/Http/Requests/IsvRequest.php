<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IsvRequest extends FormRequest
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
            'Descripcion' =>['required','string','max:255','min:3','regex:/^(?=[A-Z][a-z,á,é,í,ó,ú])(?:([\w\d*?!:; ])\1?(?!\1))+$/'],
            'isv'=>['required','min:2', 'max:5', 'regex:/^[0][.][0-9][0-9]/']
        ];
    }
}
