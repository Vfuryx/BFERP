<?php

namespace App\Http\Requests\Api;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'password.min' => '密码最低为6位',
        ];
    }

    public function attributes()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
        ];
    }
}
