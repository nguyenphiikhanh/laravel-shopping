<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Địa chỉ email đã tồn tại trên hệ thống.Vui lòng nhập email khác',
            'email.required' => 'Vui lòng nhập email',
            'name.required' => 'Vui lòng nhập tên',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ];
    }
}
