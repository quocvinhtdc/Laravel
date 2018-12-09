<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'name' => 'required|unique:categories, name' // không đc trùng nhau, ko đc để trống
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please input category name'
            'name.unique' => 'This Category is Exits'
        ];
    }
}
