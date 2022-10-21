<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    
    public function rules()
    {
        return [
        'namedm' => 'bail|required|unique:products|max:255|min:5',
        ];
    }

    public function messages()
    {
        return [
            'namedm.required' => 'Tên danh mục không được để trống',
            'namedm.unique' => 'Tên danh mục không được phép trùng',
            'namedm.max' => 'Tên danh mục không được quá 50 ký tự',
            'namedm.min' => 'Tên danh mục không được ít hơn 5 ký tự',
        ];
    }
}
