<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
        'name' => 'bail|required|unique:products|max:50|min:10',
        'price'=> 'required',
        'category_id'=> 'required',
        'content'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm không được phép trùng',
            'name.max' => 'Tên sản phẩm không được quá 50 ký tự',
            'name.min' => 'Tên sản phẩm không được ít hơn 10 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'content.required' => 'Nội dung sản phẩm không được để trống',
        ];
    }
}
