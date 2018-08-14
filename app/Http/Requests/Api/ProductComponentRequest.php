<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class ProductComponentRequest extends FormRequest
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
                    'is_common' => 'nullable|boolean',
                    'except_id' => 'nullable|integer',
                    'component_code' => 'nullable|string|max:255',
                ];
                break;
            case 'POST':
                return [
                    'product_components.*.component_code' => 'required|string|max:255|unique:product_components',
                    'product_components.*.jd_component_code' => 'string|max:255',
                    'product_components.*.vips_component_code' => 'string|max:255',
                    'product_components.*.tb_price' => 'required|numeric',
                    'product_components.*.cost' => 'required|numeric',
                    'product_components.*.price' => 'required|numeric',
                    'product_components.*.highest_price' => 'required|numeric',
                    'product_components.*.lowest_price' => 'required|numeric',
                    'product_components.*.warehouse_cost' => 'numeric',
                    'product_components.*.assembly_price' => 'numeric',
                    'product_components.*.discount' => 'numeric',
                    'product_components.*.commission' => 'numeric',
                    'product_components.*.is_common' => 'boolean',
                    'product_components.*.package_quantity' => 'integer',
                    'product_components.*.package_costs' => 'numeric',
                    'product_components.*.wooden_frame_costs' => 'numeric',
                    'product_components.*.purchase_freight' => 'numeric',
                    'product_components.*.inventory_warning' => 'required|integer',
                    'product_components.*.purchase_days_warning' => 'required|integer',
                    'product_components.*.available_warning' => 'required|integer',
                    'product_components.*.distribution_method_id' => [
                        'required', 'integer',
                        Rule::exists('distribution_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'product_components.*.bar_code' => 'string|max:255',
                    'product_components.*.img_url' => 'string|max:255',
                    'product_components.*.spec' => 'required|string|max:255',
                    'product_components.*.color' => 'string|max:255',
                    'product_components.*.materials' => 'string|max:255',
                    'product_components.*.function' => 'string|max:255',
                    'product_components.*.special' => 'string|max:255',
                    'product_components.*.other' => 'string|max:255',
                    'product_components.*.longness' => 'numeric',
                    'product_components.*.width' => 'numeric',
                    'product_components.*.height' => 'numeric',
                    'product_components.*.volume' => 'numeric',
                    'product_components.*.weight' => 'numeric',
                    'product_components.*.remark' => 'string|nullable|max:255',
                    'product_components.*.finished_pro' => 'boolean',
                    'product_components.*.is_stop_pro' => 'boolean',
                ];
                break;
            case 'PATCH':
                return [
                    'product_components.*.id' => [
                        'integer',
                        Rule::exists('product_components', 'id'),
                        function ($attribute, $value, $fail) {
                            //判断子件是否属于这个产品
                            if (\App\Models\ProductComponent::query()->findOrFail($value)->pid == $this->product->id) {
                                return true;
                            }
                            return $fail('子件不属于这个产品');
                        },
                    ],
                    'product_components.*.component_code' => [
                        'string', 'max:255',
                        function ($attribute, $value, $fail) {
                            $ex = explode('.', $attribute);

                            //判断是否存在product_components.*.id   //数据是否匹配
                            if ($id = $this->product_components[$ex[1]]['id'] ?? null)
                                if (\App\Models\ProductComponent::findOrfail($id)->component_code == $value)
                                    return true;


                            if (!\App\Models\ProductComponent::where('component_code', $value)->count())
                                return true;


                            return $fail('子件编码不能重复');
                        },
                    ],
                    'product_components.*.jd_component_code' => 'string|max:255',
                    'product_components.*.vips_component_code' => 'string|max:255',
                    'product_components.*.tb_price' => 'numeric',
                    'product_components.*.cost' => 'numeric',
                    'product_components.*.price' => 'numeric',
                    'product_components.*.highest_price' => 'numeric',
                    'product_components.*.lowest_price' => 'numeric',
                    'product_components.*.warehouse_cost' => 'numeric',
                    'product_components.*.assembly_price' => 'numeric',
                    'product_components.*.discount' => 'numeric',
                    'product_components.*.commission' => 'numeric',
                    'product_components.*.is_common' => 'boolean',
                    'product_components.*.package_quantity' => 'integer',
                    'product_components.*.package_costs' => 'numeric',
                    'product_components.*.wooden_frame_costs' => 'numeric',
                    'product_components.*.purchase_freight' => 'numeric',
                    'product_components.*.inventory_warning' => 'integer',
                    'product_components.*.purchase_days_warning' => 'integer',
                    'product_components.*.available_warning' => 'integer',
                    'product_components.*.distribution_method_id' => [
                        'integer',
                        Rule::exists('distribution_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'product_components.*.bar_code' => 'string|max:255',
                    'product_components.*.img_url' => 'string|max:255',
                    'product_components.*.spec' => 'string|max:255',
                    'product_components.*.color' => 'string|max:255',
                    'product_components.*.materials' => 'string|max:255',
                    'product_components.*.function' => 'string|max:255',
                    'product_components.*.special' => 'string|max:255',
                    'product_components.*.other' => 'string|max:255',
                    'product_components.*.longness' => 'numeric',
                    'product_components.*.width' => 'numeric',
                    'product_components.*.height' => 'numeric',
                    'product_components.*.volume' => 'numeric',
                    'product_components.*.weight' => 'numeric',
                    'product_components.*.remark' => 'string|nullable|max:255',
                    'product_components.*.finished_pro' => 'boolean',
                    'product_components.*.is_stop_pro' => 'boolean',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'is_common.boolean' => '是否通用子件必须布尔类型',

            'except_id.integer' => '子件id必须int类型',

            'component_code.string' => '子件编码必须string类型',
            'component_code.max' => '子件编码最大长度为255',

            'product_components.*.id.required' => '子件id必填',
            'product_components.*.id.integer' => '子件id必须int类型',
            'product_components.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'product_components.*.component_code.required' => '子件编码必填',
            'product_components.*.component_code.string' => '子件编码必须string类型',
            'product_components.*.component_code.max' => '子件编码最大长度为255',
            'product_components.*.component_code.unique' => '子件编码不能重复',

            'product_components.*.jd_component_code.max' => '京东子件编码最大长度为255',
            'product_components.*.jd_component_code.string' => '京东子件编码必须string类型',

            'product_components.*.vips_component_code.max' => '唯品会子件编码最大长度为255',
            'product_components.*.vips_component_code.string' => '唯品会子件编码必须string类型',

            'product_components.*.tb_price.required' => '淘宝价格必填',
            'product_components.*.tb_price.numeric' => '淘宝价格必须是数字',

            'product_components.*.cost.required' => '成本价格必填',
            'product_components.*.cost.numeric' => '成本价格必须是数字',

            'product_components.*.price.required' => '售价格必填',
            'product_components.*.price.numeric' => '售价格必须是数字',

            'product_components.*.highest_price.required' => '最高售价必填',
            'product_components.*.highest_price.numeric' => '最高售价必须是数字',

            'product_components.*.lowest_price.required' => '最低售价必填',
            'product_components.*.lowest_price.numeric' => '最低售价必须是数字',

            'product_components.*.warehouse_cost.numeric' => '仓库成本售价必须是数字',

            'product_components.*.assembly_price.numeric' => '装配价格售价必须是数字',

            'product_components.*.discount.numeric' => '折扣必须是数字',

            'product_components.*.commission.numeric' => '佣金点必须是数字',

            'product_components.*.is_common.boolean' => '是否通用子件必须布尔类型',

            'product_components.*.package_quantity.integer' => '包件数量必须int类型',

            'product_components.*.package_costs.numeric' => '打包费用必须是数字',

            'product_components.*.wooden_frame_costs.numeric' => '木架费用必须是数字',

            'product_components.*.purchase_freight.numeric' => '采购运费用必须是数字',

            'product_components.*.inventory_warning.required' => '库存预警(数量)必填',
            'product_components.*.inventory_warning.integer' => '库存预警(数量)必须int类型',

            'product_components.*.purchase_days_warning.required' => '采购预警天数必填',
            'product_components.*.purchase_days_warning.integer' => '采购预警天数必须int类型',

            'product_components.*.available_warning.required' => '可售数预警天数必填',
            'product_components.*.available_warning.integer' => '可售数预警天数必须int类型',

            'product_components.*.distribution_method_id.required' => '配送类别必填',
            'product_components.*.distribution_method_id.integer' => '配送类别必须int类型',
            'product_components.*.distribution_method_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'product_components.*.bar_code.max' => '条形码最大长度为255',
            'product_components.*.bar_code.string' => '条形码必须string类型',

            'product_components.*.img_url.max' => '图片地址最大长度为255',
            'product_components.*.img_url.string' => '图片地址必须string类型',

            'product_components.*.spec.max' => '规格最大长度为255',
            'product_components.*.spec.string' => '规格必须string类型',

            'product_components.*.color.max' => '颜色最大长度为255',
            'product_components.*.color.string' => '颜色必须string类型',

            'product_components.*.materials.max' => '材质最大长度为255',
            'product_components.*.materials.string' => '材质必须string类型',

            'product_components.*.function.max' => '功能最大长度为255',
            'product_components.*.function.string' => '功能必须string类型',

            'product_components.*.special.max' => '特殊最大长度为255',
            'product_components.*.special.string' => '特殊必须string类型',

            'product_components.*.other.max' => '其他最大长度为255',
            'product_components.*.other.string' => '其他必须string类型',

            'product_components.*.longness.numeric' => '长度（mm）必须是数字',

            'product_components.*.width.numeric' => '宽度（mm）必须是数字',

            'product_components.*.height.numeric' => '高度（mm）必须是数字',

            'product_components.*.volume.numeric' => '体积(m²)必须是数字',

            'product_components.*.weight.numeric' => '重量必须是数字',

            'product_components.*.finished_pro.boolean' => '是否成品（0=不是 1是） 必须布尔类型',

            'product_components.*.is_stop_pro.boolean' => '是否停产（0 不是 1是）必须布尔类型',

            'product_components.*.remark.string' => '备注必须string类型',
            'product_components.*.remark.nullable' => '备注可为null',
            'product_components.*.remark.max' => '备注最大长度为255',

            // 'product_components.*.status.integer' => '状态必须int类型',
            // 'product_components.*.status.required' => '状态必填'
        ];
    }

    public function attributes()
    {
        return [
            'pid' => '产品id',
            'component_code' => '子件编码',
            'jd_component_code' => '京东子件编码',
            'vips_component_code' => '唯品会子件编码',
            'tb_price' => '淘宝价格',
            'cost' => '成本价格',
            'price' => '售价',
            'highest_price' => '最高售价',
            'lowest_price' => '最低售价',
            'warehouse_cost' => '仓库成本',
            'assembly_price' => '装配价格',
            'discount' => '折扣',
            'commission' => '佣金点',
            'is_common' => '是否通用子件',
            'package_quantity' => '包件数量',
            'package_costs' => '打包费用',
            'wooden_frame_costs' => '木架费',
            'purchase_freight' => '采购运费',
            'inventory_warning' => '库存预警(数量)',
            'purchase_days_warning' => '采购预警天数',
            'available_warning' => '可售数预警',
            'distribution_method_id' => '配送类别',
            'bar_code' => '条形码',
            'img_url' => '图片地址',
            'spec' => '规格',
            'color' => '颜色',
            'materials' => '材质',
            'function' => '功能',
            'special' => '特殊',
            'other' => '其他',
            'longness' => '长度（mm）',
            'width' => '宽度（mm）',
            'height' => '高度（mm）',
            'volume' => '体积(m²)',
            'weight' => '重量',
            'remark' => '备注',
            'finished_pro' => '是否成品 0 不是 1 是',
            'is_stop_pro' => '是否停产 0 不是 1 是',
        ];
    }
}
