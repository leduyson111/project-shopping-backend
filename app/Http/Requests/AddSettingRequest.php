<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
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
            'config_key' => 'bail|required|unique:settings_models|max:255',
            'config_value' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'config_key.required' => 'Bạn cần nhập configkey',
            'config_key.unique' => 'Bạn nhập trùng đã tồn tại configkey',
            'config_key.max' => 'Bạn nhập dài quá configkey',
            'config_value.required' => 'Bạn không được để trống',
        ];
    }
}
