<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnoRequest extends FormRequest
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
            'TipoTurno' =>['required', 'alpha', 'min:3', 'max:10', 'regex:/^(?=[A-Z][a-z,á,é,í,ó,ú,ñ]+)(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'Descripcion' =>['required', 'alpha', 'min:3', 'max:10'],
            'HoraEntrada' =>['required'],
            'HoraSalida' =>['required']

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
