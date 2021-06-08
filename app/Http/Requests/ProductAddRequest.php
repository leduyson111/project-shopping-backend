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
//            'name' => 'required|unique:products|max:255|min:10',
            'name' => 'bail|required|unique:products|max:255|min:10',
            'price'=> 'required',
            'feature_image_path' => 'required',
            'category_id'=> 'required',
            'contents'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'name.unique' => 'Tên không được trung bỏ trống',
            'name.max' => 'Tên không được dài quá 255 kí tự',
            'name.min' => 'Tên không được ngắn quá 10 kí tự',
            'price.required' => 'giá không được bỏ trống',
            'feature_image_path.required' => 'Bạn cần chọn ảnh không được bỏ trống',
            'category_id.required'=> 'Danh mục không được bỏ trống',
            'contents.required'=>'Nội dung không được bỏ trống',
        ];
    }
}
