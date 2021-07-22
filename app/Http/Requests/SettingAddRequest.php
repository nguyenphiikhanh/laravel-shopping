<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' =>'bail|required|unique:settings|max:255',
            'config_value' => 'required'
        ];
    }

    public function messages()
{
    return [
        'config_key.required' => 'Bắt buộc nhập config key',
        'config_value.required' => 'Bắt buộc nhập config value',
        'config_value.unique' => 'Config đã tồn tại',
        'config_value.max' => 'Tối đa 255 kí tự',
    ];
}
}
