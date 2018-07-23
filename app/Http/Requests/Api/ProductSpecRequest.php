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
    public function rules($id = 0)
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'status' => 'integer'
                ];
                break;
            case 'POST':
                return [
//                    'goods_id' => [
//                        'sometimes','required','integer',
//                        Rule::exists('goods','id')->where(function ($query) {
//                            $query->where('status',1);
//                        }),
//                    ],
                    'spec_code' => 'sometimes|required|string|max:255|unique:product_specs',
                    'jd_specs_code' => 'string|max:255',
                    'vips_specs_code' => 'string|max:255',
                    'tb_price' => 'sometimes|required|numeric',
                    'cost' => 'sometimes|required|numeric',
                    'price' => 'sometimes|required|numeric',
                    'highest_price' => 'sometimes|required|numeric',
                    'lowest_price' => 'sometimes|required|numeric',
                    'warehouse_cost' => 'numeric',
                    'assembly_price' => 'numeric',
                    'discount' => 'numeric',
                    'commission' => 'numeric',
                    'is_combination' => 'integer',
                    'package_quantity' => 'integer',
                    'package_costs' => 'numeric',
                    'wooden_frame_costs' => 'numeric',
                    'purchase_freight' => 'numeric',
                    'inventory_warning' => 'sometimes|required|integer',
                    'purchase_days_warning' => 'sometimes|required|integer',
                    'available_warning' => 'sometimes|required|integer',
                    'distribution_method_id' => [
                        'sometimes', 'required', 'integer',
                        Rule::exists('distribution_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'bar_code' => 'string|max:255',
                    'img_url' => 'url|max:255',
                    'spec' => 'sometimes|required|string|max:255',
                    'color' => 'string|max:255',
                    'materials' => 'string|max:255',
                    'function' => 'string|max:255',
                    'special' => 'string|max:255',
                    'other' => 'string|max:255',
                    'length' => 'numeric',
                    'width' => 'numeric',
                    'height' => 'numeric',
                    'volume' => 'numeric',
                    'weight' => 'numeric',
                    'remark' => 'string|nullable|max:255',
                    'finished_pro' => 'integer',
                    'is_stop_pro' => 'integer',
                    'status' => 'integer'
                ];
                break;
            case 'PATCH':
                return [
//                    'goods_id' => [
//                        'integer',
//                        Rule::exists('goods','id')->where(function ($query) {
//                            $query->where('status',1);
//                        }),
//                    ],
                    'spec_code' => [
                        'string', 'max:255',
                        Rule::unique('product_specs')->ignore(isset($this->productspec->id) ? $this->productspec->id : $id),
                    ],
                    'jd_specs_code' => 'string|max:255',
                    'vips_specs_code' => 'string|max:255',
                    'tb_price' => 'numeric',
                    'cost' => 'numeric',
                    'price' => 'numeric',
                    'highest_price' => 'numeric',
                    'lowest_price' => 'numeric',
                    'warehouse_cost' => 'numeric',
                    'assembly_price' => 'numeric',
                    'discount' => 'numeric',
                    'commission' => 'numeric',
                    'is_combination' => 'integer',
                    'package_quantity' => 'integer',
                    'package_costs' => 'numeric',
                    'wooden_frame_costs' => 'numeric',
                    'purchase_freight' => 'numeric',
                    'inventory_warning' => 'integer',
                    'purchase_days_warning' => 'integer',
                    'available_warning' => 'integer',
                    'distribution_method_id' => [
                        'integer',
                        Rule::exists('distribution_methods', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'bar_code' => 'string|max:255',
                    'img_url' => 'url|max:255',
                    'spec' => 'string|max:255',
                    'color' => 'string|max:255',
                    'materials' => 'string|max:255',
                    'function' => 'string|max:255',
                    'special' => 'string|max:255',
                    'other' => 'string|max:255',
                    'length' => 'numeric',
                    'width' => 'numeric',
                    'height' => 'numeric',
                    'volume' => 'numeric',
                    'weight' => 'numeric',
                    'remark' => 'string|nullable|max:255',
                    'finished_pro' => 'integer',
                    'is_stop_pro' => 'integer',
                    'status' => 'integer'
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'goods_id.required' => '产品id必填',
            'goods_id.integer' => '产品id必须int类型',
            'goods_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'spec_code.required' => '规格编码必填',
            'spec_code.string' => '规格编码必须string类型',
            'spec_code.max' => '规格编码最大长度为255',
            'spec_code.unique' => '规格编码不能重复',

            'jd_specs_code.max' => '京东规格编码最大长度为255',
            'jd_specs_code.string' => '京东规格编码必须string类型',

            'vips_specs_code.max' => '唯品会规格编码最大长度为255',
            'vips_specs_code.string' => '唯品会规格编码必须string类型',

            'tb_price.required' => '淘宝价格必填',
            'tb_price.numeric' => '淘宝价格必须是数字',

            'cost.required' => '成本价格必填',
            'cost.numeric' => '成本价格必须是数字',

            'price.required' => '售价格必填',
            'price.numeric' => '售价格必须是数字',

            'highest_price.required' => '最高售价必填',
            'highest_price.numeric' => '最高售价必须是数字',

            'lowest_price.required' => '最低售价必填',
            'lowest_price.numeric' => '最低售价必须是数字',

            'warehouse_cost.numeric' => '仓库成本售价必须是数字',

            'assembly_price.numeric' => '装配价格售价必须是数字',

            'discount.numeric' => '折扣必须是数字',

            'commission.numeric' => '金佣点必须是数字',

            'is_combination.integer' => '是否组合必须int类型',

            'package_quantity.integer' => '包件数量必须int类型',

            'package_costs.numeric' => '打包费用必须是数字',

            'wooden_frame_costs.numeric' => '木架费用必须是数字',

            'purchase_freight.numeric' => '采购运费用必须是数字',

            'inventory_warning.required' => '库存预警(数量)必填',
            'inventory_warning.integer' => '库存预警(数量)必须int类型',

            'purchase_days_warning.required' => '采购预警天数必填',
            'purchase_days_warning.integer' => '采购预警天数必须int类型',

            'available_warning.required' => '可售数预警天数必填',
            'available_warning.integer' => '可售数预警天数必须int类型',

            'distribution_method_id.required' => '配送类别必填',
            'distribution_method_id.integer' => '配送类别必须int类型',
            'distribution_method_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'bar_code.max' => '条形码最大长度为255',
            'bar_code.string' => '条形码必须string类型',

            'img_url.max' => '图片地址最大长度为255',
            'img_url.url' => '图片地址必须有效的url',

            'spec.max' => '规格最大长度为255',
            'spec.string' => '规格必须string类型',

            'color.max' => '颜色最大长度为255',
            'color.string' => '颜色必须string类型',

            'materials.max' => '材质最大长度为255',
            'materials.string' => '材质必须string类型',

            'function.max' => '功能最大长度为255',
            'function.string' => '功能必须string类型',

            'special.max' => '特殊最大长度为255',
            'special.string' => '特殊必须string类型',

            'other.max' => '其他最大长度为255',
            'other.string' => '其他必须string类型',

            'length.numeric' => '长度（mm）必须是数字',

            'width.numeric' => '宽度（mm）必须是数字',

            'height.numeric' => '高度（mm）必须是数字',

            'volume.numeric' => '体积(m²)必须是数字',

            'weight.numeric' => '重量必须是数字',

            'finished_pro.integer' => '是否成品 0=不是 1=是必须int类型',

            'is_stop_pro.integer' => '是否停产 0 不是 1 是必须int类型',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'status.integer' => '状态必须int类型',
            'status.required' => '状态必填'
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
            'commission' => '金佣点',
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
            'status' => '状态：0=停用，1=启用',
        ];
    }
}
