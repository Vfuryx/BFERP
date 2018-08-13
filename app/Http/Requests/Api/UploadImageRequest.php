<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class UploadImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'image' => 'required|mimes:jpeg,png,gif|max:5120',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'image.required' => '图片不存在',
            'image.mimes' => '图片类型限定为jpeg、png、gif',
            'image.max' => '图片大小不能超过5M',
        ];
    }

    public function attributes()
    {
        return [
            'image' => '图片',
        ];
    }

}
