<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MarkColorRequest extends FormRequest
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
        switch($this->method()) {
            case 'POST':
                return [
                    'code' => 'required|string',
                    'name' => 'required|string',
                ];
                break;
            case 'PATCH':
                return [
                    'code' => 'required|string',
                    'name' => 'required|string',
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'code.required' => '标记颜色代码必填',
            'name.required' => '标记颜色名称必填',
        ];
    }
}
