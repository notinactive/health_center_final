<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'unitname' => 'required',
        ];
    }

     public function attributes()
    {
        return [
            'unitname' => 'نام واحد',
        ];
    }

     public function messages ()
    {
        return [
           
            'required' => 'لطفا :attribute را وارد نمائید',
        ];
    }
}
