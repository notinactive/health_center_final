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
            
            'name' => 'required|min:10|numeric',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'fname' => 'required',
            'lname' => 'required',
            'mobile' => 'required|numeric',
           

        ];
    }

     public function attributes()
    {
        return [
            'name' => 'نام کاربری',
            'email' => 'آدرس ایمیل',
            'password' => 'رمز عبور',
            'fname' => 'نام',
            'lname' => 'نام خانوادگی',
            'mobile' => 'شماره همراه',
            
        ];
    }

     public function messages ()
    {
        return [
           
            'required' => 'لطفا :attribute را وارد نمائید',
            'email' => 'لطفا ایمیل را با فرمت صحیح وارد نمائید',
            'password.min' => 'طول رمز عبور نباید کمتر از 6 کاراکتر باشد',
            'numeric' => 'لطفا شماره موبایل را با فرمت عددی وارد نمائید',
            'name.min' => 'کد ملی نباید کمتر از 10 رقم وارد شود',
            'name.numeric' => 'لطفا کد ملی را با فرمت عددی وارد نمائید',
        ];
    }
}
