<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'required|unique:silders|max:255|min:5',
            'descripiton' => 'required',
            'image_path' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => ' Bạn cần nhập tên slider',
            'name.unique' => 'Tên này đã tồn tại nhập tên khác',
            'name.max' => 'Tên này quá dài',
            'name.min' => 'Tên này quá ngắn',
            'descripiton.required' => 'Bạn cần nhập đề mô',
            'image_path.required' => 'Bạn cần chọn hình ảnh',
        ];
    }
}
