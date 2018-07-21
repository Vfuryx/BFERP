<?php

namespace App\Http\Requests\Api;

class DestroyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'DELETE':
                return [
                    'ids' => 'required|string',
                ];
                break;
            default:
                return [];
                break;
        }
    }

    public function messages()
    {
        return [
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型',
        ];
    }

    public function attributes()
    {
        return [
            'ids' => 'id组',
        ];
    }

}
