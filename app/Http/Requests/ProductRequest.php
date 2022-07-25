<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => request()->route('id')
             ? 'required|unique:products,name,'.request()->route('id')
             : 'required|unique:products',

             'price' => 'required|min:10000|integer',

             'intro' => 'required',
             'content' => 'required',
             'image'   => request()->route('id') 
                            ? 'mimes:jpg,bmp,png|max:2048'
                            :'required|mimes:jpg,bmp,png|max:2048'
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Vui Lòng nhập tên sản phẩm',
            'name.unique' => 'Sản phẩm này đã tồn tại',
            'price.required' => 'Vui Lòng nhập giá cho sản phẩm',
            'price.integer' => 'Giá sản phẩm phải là số',
            'price.min' => 'Số thấp nhất là 10.000 VNĐ',
            'intro.required' => 'Vui Lòng nhập tóm tắt sản phẩm',
            'content.required' => 'Vui Lòng nhập nội dung sản phẩm',
            'image.required' => 'Vui Lòng chọn hình sản phẩm',
            'image.mimes' => 'Hình sản phẩm phải là đuôi .jpg, .bmp, .png'
        ];
    }
}
