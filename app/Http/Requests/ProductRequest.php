<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required', // không đc trùng nhau, ko đc để trống
            'fileToUpLoad'  => 'required|image|max:10000',
            'price'  => 'required',
            'description'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'Please input Product name',
            'fileToUpLoad.max'  => 'max size is 10000kb' ,
            'fileToUpLoad.image'     => 'This file is not image' ,
            'price.required'   => 'Please enter price',
            'description.required'   => 'Please enter description'
        ];
    }
}
