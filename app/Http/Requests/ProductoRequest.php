<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            //'NombreProducto'=>['required','string','max:25','min:3','regex:/^(?=[A-Z ][ a-z,á,é,í,ó,ú,ñ ])(?:([ \w\d*?!:; ])\1?(?!\1))+$/'],
            'NombreProducto'=>['required','string','max:25','min:3','regex:/^(?=[A-Z ][ a-z,á,é,í,ó,ú ])(?:([ \ñ\w\d*?!:; ])\1?(?!\1))+$/'],
            'Descripcion'=>['required','string','max:100','min:3','regex:/^(?=[A-Z ][ a-z,á,é,í,ó,ú ])(?:([  \ñ\w\d*?!:; ])\1?(?!\1))+$/'],
            'id_Categoria'=>['required'],
            'Precio'=>['required','min:2', 'max:5', 'regex:/^[0-9][0-9][.][0-9][0-9]/']
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
