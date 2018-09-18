<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class SeriesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'status' => 'boolean',
                ];
                break;
            case 'POST':
                return [
                    'series.*.code' => [
                        'required', 'string', 'max:255', 'unique:series',
                        function ($attribute, $value, $fail) {

                            if((collect($this->series)->where('code',$value)->count()>1)){
                                return $fail('存在重复的系列代码');
                            }

                            return true;
                        },
                    ],
                    'series.*.name' => 'required|string|max:255',
                    'series.*.description' => 'string|nullable|max:255',
                    'series.*.remark' => 'string|nullable|max:255',
                    'series.*.status' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'series.*.id' => [
                        'integer',
                        Rule::exists('series', 'id'),
                    ],
                    'series.*.code' => [
                        'string','max:255',
                        function ($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);

                            if((collect($this->series)->where('code',$value)->count()>1))
                                return $fail('存在重复的系列代码');

                            //判断是否存在id
                            if($id = $this->series[$ex[1]]['id'] ?? null){
                                //判断code是否有修改
                                if(\App\Models\Series::query()->findOrFail($id)->code != $value)
                                    //判断修改的code在表内是否唯一
                                    if(\App\Models\Series::query()->where('code',$value)->count())
                                        return $fail('存在重复的系列代码');
                            }else{
                                //判断新增的code在表内是否唯一
                                if(\App\Models\Series::query()->where('code',$value)->count())
                                    return $fail('存在重复的系列代码');
                            }

                            return true;
                        },
                    ],
                    'series.*.name' => 'required|string|max:255',
                    'series.*.description' => 'string|nullable|max:255',
                    'series.*.remark' => 'string|nullable|max:255',
                    'series.*.status' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'series.*.id.integer' => '传真必须integer类型',
            'series.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'series.*.code.required' => '系列代码必填',
            'series.*.code.string' => '系列代码必须string类型',
            'series.*.code.max' => '系列代码最大长度为255',
            'series.*.code.unique' => '系列代码不能重复',
            
            'series.*.name.required' => '系列名称必填',
            'series.*.name.max' => '系列名称最大长度为255',
            'series.*.name.string' => '系列名称必须string类型',

            'series.*.description.string' => '系列描述必须string类型',
            'series.*.description.nullable' => '系列描述可为null',
            'series.*.description.max' => '系列描述最大长度为255',

            'series.*.remark.string' => '备注必须string类型',
            'series.*.remark.nullable' => '备注可为null',
            'series.*.remark.max' => '备注最大长度为255',

            'series.*.status.required' => '状态必填',
            'series.*.status.boolean' => '状态必须布尔类型',
        ];
    }

    public function attributes()
    {
        return [
            'suppliers_id' => '供应商id',
            'code' => '系列代码',
            'name' => '系列名称',
            'description' => '系列描述',
            'remark' => '备注',
            'status' => '状态：0=停用，1=启用'
        ];
    }

}
