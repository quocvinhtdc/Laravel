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
            'txtuser'      => 'required|unique:users,name', // không đc trùng nhau, ko đc để trống
            'txtPassWord'  => 'required',
            'RePassWord'   => 'required|same:txtPassWord',
            'txtEmail'     => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/'

        ];
    }

    public function messages()
    {
        return [
            'txtuser.required' => 'Please input UserName',
            'txtuser.unique' => 'This UserName  is exist',
            'txtPassWord.required' => 'Please input Password',
            'RePassWord.required' => 'Please input Re-Password',
            'RePassWord.same' => 'Password don\'t match',
            'txtEmail.required' => 'Please input email',
            'txtEmail.regex' => 'Email error Syntax' 
        ];
    }
}
