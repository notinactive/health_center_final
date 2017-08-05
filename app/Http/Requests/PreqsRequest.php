<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreqsRequest extends FormRequest
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
             'name'=>'required',
             'count' => 'required',
             'description' => 'required'
        ];
    }

     public function attributes()
    {
        return [
             'name'=>'نام کالا',
             'count' => 'مقدار برآورد شده',
             'description' => 'توضیحات مربوطه'
        ];
    }

     public function messages ()
    {
        return [
           
            'required' => 'لطفا :attribute را وارد نمائید',
        ];
    }
}
