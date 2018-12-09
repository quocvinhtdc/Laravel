<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'txtname' => 'required|unique:categories,name' // không đc trùng nhau, ko đc để trống

        ];
    }

    public function messages()
    {
        return [
            'txtname.required' => 'Please input category name',
            'txtname.unique' => 'This Name category is exist'     
        ];
    }
}
