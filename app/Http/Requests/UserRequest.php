<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' =>['required', 'alpha', 'min:3', 'max:10', 'regex:/^(?=[A-Z][a-z,á,é,í,ó,ú,ñ]+)(?:([\w\d*?!:;])\1?(?!\1))+$/'],
            'email'  =>['required', 'string','unique:users', 'email', 'regex:/[\w._%+-]{3,}+@[\w.-]+\.[a-zA-Z]{2,4}/' ]
        ];
    }
    public function withvalidator($validator)
    {
        $validator->after(function($validator){
            if($validator->errors()->count()){
                if(!in_array($this->method(),['post'])){
                    $validator->errors()->add('PUT',true);
                }
                if(!in_array($this->method(),['PUT'])){
                    $validator->errors()->add('post',true);
                }
                
            }
        });
    }
}
