<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipodocumentosRequest extends FormRequest
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
            'TipoDocumento'=>['required','string','max:255','min:3','regex:/^(?=[A-Z][a-z,á,é,í,ó,ú])(?:([\w\d*?!:; ])\1?(?!\1))+$/'],
            'Descripcion'=>['required','string','max:255','min:3','regex:/^(?=[A-Z][a-z,á,é,í,ó,ú])(?:([\w\d*?!:; ])\1?(?!\1))+$/']
        ];
    }


    
    
}


