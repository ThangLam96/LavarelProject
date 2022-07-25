<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => request()->route('id')
             ? 'required|unique:users,email,'.request()->route('id')
             : 'required|unique:users',

             'password' => request()->route('id') 
                            ? 'confirmed'
                            : 'required|confirmed|min:6',

             'fullname' => 'required',
             'phone'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:10',

             'avatar'   => request()->route('id') 
                            ? 'mimes:jpg,bmp,png|max:2048'
                            :'required|mimes:jpg,bmp,png|max:2048'
        ];
    }

    public function messages() 
    {
        return [
            'email.required' => 'Vui Lòng nhập tên email',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Vui Lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu xác nhận chưa chính xác',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự',
            'fullname.required' => 'Vui Lòng nhập đầy đủ họ tên',
            'phone.required' => 'Vui Lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại là số không phải chữ',
            'phone.digits' => 'Số điện thoại phải là 10 số',
            'avatar.required' => 'Vui Lòng chọn hình đại diện',
            'avatar.mimes' => 'Hình đại diện phải là đuôi .jpg, .bmp, .png'
        ];
    }
}
