<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class ProductSpecRequest extends FormRequest
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
                    'status' => 'integer'
                ];
                break;
            case 'POST':
                return [
                    'productspecs.*.spec_code' => 'required|string|max:255|unique:product_specs',
                    'productspecs.*.jd_specs_code' => 'string|max:255',
                    'productspecs.*.vips_specs_code' => 'string|max:255',
                    'productspecs.*.tb_price' => 'required|numeric',
                    'productspecs.*.cost' => 'required|numeric',
                    'productspecs.*.price' => 'required|numeric',
                    'productspecs.*.highest_price' => 'required|numeric',
                    'productspecs.*.lowest_price' => 'required|numeric',
                    'productspecs.*.warehouse_cost' => 'numeric',
                    'productspecs.*.assembly_price' => 'numeric',
                    'productspecs.*.discount' => 'numeric',
                    'productspecs.*.commission' => 'numeric',
                    'productspecs.*.is_combination' => 'integer',
                    'productspecs.*.package_quantity' => 'integer',
                    'productspecs.*.package_costs' => 'numeric',
                    'productspecs.*.wooden_frame_costs' => 'numeric',
                    'productspecs.*.purchase_freight' => 'numeric',
                    'productspecs.*.inventory_warning' => 'required|integer',
                    'productspecs.*.purchase_days_warning' => 'required|integer',
                    'productspecs.*.available_warning' => 'required|integer',
                    'productspecs.*.distribution_method_id' => [
                        'required', 'integer',
                        Rule::exists('distribution_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'productspecs.*.bar_code' => 'string|max:255',
                    'productspecs.*.img_url' => 'url|max:255',
                    'productspecs.*.spec' => 'required|string|max:255',
                    'productspecs.*.color' => 'string|max:255',
                    'productspecs.*.materials' => 'string|max:255',
                    'productspecs.*.function' => 'string|max:255',
                    'productspecs.*.special' => 'string|max:255',
                    'productspecs.*.other' => 'string|max:255',
                    'productspecs.*.length' => 'numeric',
                    'productspecs.*.width' => 'numeric',
                    'productspecs.*.height' => 'numeric',
                    'productspecs.*.volume' => 'numeric',
                    'productspecs.*.weight' => 'numeric',
                    'productspecs.*.remark' => 'string|nullable|max:255',
                    'productspecs.*.finished_pro' => 'integer',
                    'productspecs.*.is_stop_pro' => 'integer',
                    // 'productspecs.*.status' => 'integer'
                ];
                break;
            case 'PATCH':
                return [
                    'productspecs.*.id' => [
                        'integer',
                        Rule::exists('product_specs', 'id')
                    ],
                    'productspecs.*.spec_code' => [
                        'string', 'max:255',
                        Rule::unique('product_specs')->ignore($this->productspecs[0]['id']),
                    ],
                    'productspecs.*.jd_specs_code' => 'string|max:255',
                    'productspecs.*.vips_specs_code' => 'string|max:255',
                    'productspecs.*.tb_price' => 'numeric',
                    'productspecs.*.cost' => 'numeric',
                    'productspecs.*.price' => 'numeric',
                    'productspecs.*.highest_price' => 'numeric',
                    'productspecs.*.lowest_price' => 'numeric',
                    'productspecs.*.warehouse_cost' => 'numeric',
                    'productspecs.*.assembly_price' => 'numeric',
                    'productspecs.*.discount' => 'numeric',
                    'productspecs.*.commission' => 'numeric',
                    'productspecs.*.is_combination' => 'integer',
                    'productspecs.*.package_quantity' => 'integer',
                    'productspecs.*.package_costs' => 'numeric',
                    'productspecs.*.wooden_frame_costs' => 'numeric',
                    'productspecs.*.purchase_freight' => 'numeric',
                    'productspecs.*.inventory_warning' => 'integer',
                    'productspecs.*.purchase_days_warning' => 'integer',
                    'productspecs.*.available_warning' => 'integer',
                    'productspecs.*.distribution_method_id' => [
                        'integer',
                        Rule::exists('distribution_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'productspecs.*.bar_code' => 'string|max:255',
                    'productspecs.*.img_url' => 'url|max:255',
                    'productspecs.*.spec' => 'string|max:255',
                    'productspecs.*.color' => 'string|max:255',
                    'productspecs.*.materials' => 'string|max:255',
                    'productspecs.*.function' => 'string|max:255',
                    'productspecs.*.special' => 'string|max:255',
                    'productspecs.*.other' => 'string|max:255',
                    'productspecs.*.length' => 'numeric',
                    'productspecs.*.width' => 'numeric',
                    'productspecs.*.height' => 'numeric',
                    'productspecs.*.volume' => 'numeric',
                    'productspecs.*.weight' => 'numeric',
                    'productspecs.*.remark' => 'string|nullable|max:255',
                    'productspecs.*.finished_pro' => 'integer',
                    'productspecs.*.is_stop_pro' => 'integer',
                    // 'productspecs.*.status' => 'integer'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'productspecs.*.id.required' => '规格id必填',
            'productspecs.*.id.integer' => '规格id必须int类型',
            'productspecs.*.id.exists' => '需要添加的id在数据库中未找到或未启用',

            'productspecs.*.spec_code.required' => '规格编码必填',
            'productspecs.*.spec_code.string' => '规格编码必须string类型',
            'productspecs.*.spec_code.max' => '规格编码最大长度为255',
            'productspecs.*.spec_code.unique' => '规格编码不能重复',

            'productspecs.*.jd_specs_code.max' => '京东规格编码最大长度为255',
            'productspecs.*.jd_specs_code.string' => '京东规格编码必须string类型',

            'productspecs.*.vips_specs_code.max' => '唯品会规格编码最大长度为255',
            'productspecs.*.vips_specs_code.string' => '唯品会规格编码必须string类型',

            'productspecs.*.tb_price.required' => '淘宝价格必填',
            'productspecs.*.tb_price.numeric' => '淘宝价格必须是数字',

            'productspecs.*.cost.required' => '成本价格必填',
            'productspecs.*.cost.numeric' => '成本价格必须是数字',

            'productspecs.*.price.required' => '售价格必填',
            'productspecs.*.price.numeric' => '售价格必须是数字',

            'productspecs.*.highest_price.required' => '最高售价必填',
            'productspecs.*.highest_price.numeric' => '最高售价必须是数字',

            'productspecs.*.lowest_price.required' => '最低售价必填',
            'productspecs.*.lowest_price.numeric' => '最低售价必须是数字',

            'productspecs.*.warehouse_cost.numeric' => '仓库成本售价必须是数字',

            'productspecs.*.assembly_price.numeric' => '装配价格售价必须是数字',

            'productspecs.*.discount.numeric' => '折扣必须是数字',

            'productspecs.*.commission.numeric' => '佣金点必须是数字',

            'productspecs.*.is_combination.integer' => '是否组合必须int类型',

            'productspecs.*.package_quantity.integer' => '包件数量必须int类型',

            'productspecs.*.package_costs.numeric' => '打包费用必须是数字',

            'productspecs.*.wooden_frame_costs.numeric' => '木架费用必须是数字',

            'productspecs.*.purchase_freight.numeric' => '采购运费用必须是数字',

            'productspecs.*.inventory_warning.required' => '库存预警(数量)必填',
            'productspecs.*.inventory_warning.integer' => '库存预警(数量)必须int类型',

            'productspecs.*.purchase_days_warning.required' => '采购预警天数必填',
            'productspecs.*.purchase_days_warning.integer' => '采购预警天数必须int类型',

            'productspecs.*.available_warning.required' => '可售数预警天数必填',
            'productspecs.*.available_warning.integer' => '可售数预警天数必须int类型',

            'productspecs.*.distribution_method_id.required' => '配送类别必填',
            'productspecs.*.distribution_method_id.integer' => '配送类别必须int类型',
            'productspecs.*.distribution_method_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'productspecs.*.bar_code.max' => '条形码最大长度为255',
            'productspecs.*.bar_code.string' => '条形码必须string类型',

            'productspecs.*.img_url.max' => '图片地址最大长度为255',
            'productspecs.*.img_url.url' => '图片地址必须有效的url',

            'productspecs.*.spec.max' => '规格最大长度为255',
            'productspecs.*.spec.string' => '规格必须string类型',

            'productspecs.*.color.max' => '颜色最大长度为255',
            'productspecs.*.color.string' => '颜色必须string类型',

            'productspecs.*.materials.max' => '材质最大长度为255',
            'productspecs.*.materials.string' => '材质必须string类型',

            'productspecs.*.function.max' => '功能最大长度为255',
            'productspecs.*.function.string' => '功能必须string类型',

            'productspecs.*.special.max' => '特殊最大长度为255',
            'productspecs.*.special.string' => '特殊必须string类型',

            'productspecs.*.other.max' => '其他最大长度为255',
            'productspecs.*.other.string' => '其他必须string类型',

            'productspecs.*.length.numeric' => '长度（mm）必须是数字',

            'productspecs.*.width.numeric' => '宽度（mm）必须是数字',

            'productspecs.*.height.numeric' => '高度（mm）必须是数字',

            'productspecs.*.volume.numeric' => '体积(m²)必须是数字',

            'productspecs.*.weight.numeric' => '重量必须是数字',

            'productspecs.*.finished_pro.integer' => '是否成品 0=不是 1=是必须int类型',

            'productspecs.*.is_stop_pro.integer' => '是否停产 0 不是 1 是必须int类型',

            'productspecs.*.remark.string' => '备注必须string类型',
            'productspecs.*.remark.nullable' => '备注可为null',
            'productspecs.*.remark.max' => '备注最大长度为255',

            'productspecs.*.status.integer' => '状态必须int类型',
            'productspecs.*.status.required' => '状态必填'
        ];
    }

    public function attributes()
    {
        return [
            'goods_id' => '产品id',
            'spec_code' => '规格编码',
            'jd_specs_code' => '京东规格编码',
            'vips_specs_code' => '唯品会规格编码',
            'tb_price' => '淘宝价格',
            'cost' => '成本价格',
            'price' => '售价',
            'highest_price' => '最高售价',
            'lowest_price' => '最低售价',
            'warehouse_cost' => '仓库成本',
            'assembly_price' => '装配价格',
            'discount' => '折扣',
            'commission' => '佣金点',
            'is_combination' => '是否组合',
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
            'length' => '长度（mm）',
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
