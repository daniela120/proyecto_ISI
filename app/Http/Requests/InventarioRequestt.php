<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequestt extends FormRequest
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
           'NombreInventario'=>['required','string','max:25','min:3','regex:/^(?=[A-Z ][ a-z,á,é,í,ó,ú ])(?:([ \w\d*?!:; ])\1?(?!\1))+$/'],
           'Id_Categoria'=>['required'],
           'PrecioUnitario'=>['required','max:6','min:4'],
           'CantidadStock'=>['required','string','max:15','min:3','regex:/^(?=[A-Z ][ a-z,á,é,í,ó,ú ])(?:([  \w\d*?!:; ])\1?(?!\1))+$/'],
           'StockMin'=>['required','gte:10','lte:20'],
           'StockMax'=>['required','gte:20','lte:60'],
           'StockActual'=>['required','gte:StockMin','lte:StockMax'],
           'Id_Proveedor'=>['required'],
           'Descontinuado' =>['required','regex:/^[0,1]+$/']
            

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
