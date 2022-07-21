<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
             ? 'required|unique:categories,name,'.request()->route('id')
             : 'required|unique:categories'
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Vui Lòng nhập tên thể loại',
            'name.unique' => 'Thể Loại này đã tồn tại',
        ];
    }
}
