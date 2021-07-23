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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'bail|required|max:255|min:5',
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được phép để trống.',
            'name.max' => 'Tên sản phẩm không được phép quá 255 kí tự.',
            'name.min' => 'Tên sản phẩm không được dưới 5 kí tự.',
            'category_id.required' => 'Danh mục không được phép để trống.',
            'contents.required' => 'Nội dung mô tả không được để trống.',
            'price.required' => 'Giá sản phẩm không được phép để trống.',

        ];
    }
}
