<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignatureRequest extends FormRequest
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
            'user_id' => 'required',
            'unit_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ];       
    }

     public function attributes()
    {
        return[
            'user_id' => 'نام کاربر',
            'unit_id' => 'نام واحد مربوطه',
            'image'=>'اسکن امضاء'
        ];
    }

    public function messages()
    {
        return[
            'required' => ':attribute را وارد نمائید .',
            'mimes'=>'پسوند عکس فقط می تواند jpeg,png,jpg باشد .'
        ];
    }
}
