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
                    'goods_id' => [
                        'sometimes','required','integer',
                        Rule::exists('goods','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'spec_code' => 'sometimes|required|string|max:255|unique:product_specs',
                    'jd_specs_code' => 'sometimes|required|string|max:255',
                    'vips_specs_code' => 'sometimes|required|string|max:255',
                    'tb_price' => 'sometimes|required|numeric',
                    'cost' => 'sometimes|required|numeric',
                    'price' => 'sometimes|required|numeric',
                    'highest_price' => 'sometimes|required|numeric',
                    'lowest_price' => 'sometimes|required|numeric',
                    'warehouse_cost' => 'sometimes|required|numeric',
                    'assembly_price' => 'sometimes|required|numeric',
                    'discount' => 'sometimes|required|numeric',
                    'commission' => 'sometimes|required|numeric',
                    'is_combination' => 'sometimes|integer',
                    'package_quantity' => 'sometimes|required|integer',
                    'package_costs' => 'sometimes|required|numeric',
                    'wooden_frame_costs' => 'sometimes|required|numeric',
                    'purchase_freight' => 'sometimes|required|numeric',
                    'inventory_warning' => 'sometimes|required|integer',
                    'purchase_days_warning' => 'sometimes|required|integer',
                    'available_warning' => 'sometimes|required|integer',
                    'distribution_method_id' => [
                        'sometimes', 'required','integer',
                        Rule::exists('distribution_methods','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'bar_code' => 'sometimes|required|string|max:255',
                    'img_url' => 'sometimes|required|url|max:255',
                    'spec' => 'sometimes|required|string|max:255',
                    'color' => 'sometimes|required|string|max:255',
                    'materials' => 'sometimes|required|string|max:255',
                    'function' => 'sometimes|required|string|max:255',
                    'special' => 'sometimes|required|string|max:255',
                    'other' => 'sometimes|required|string|max:255',
                    'length' => 'sometimes|required|numeric',
                    'width' => 'sometimes|required|numeric',
                    'height' => 'sometimes|required|numeric',
                    'volume' => 'sometimes|required|numeric',
                    'weight' => 'sometimes|required|numeric',
                    'remark' => 'sometimes|string|nullable|max:255',
                    'finished_pro' => 'sometimes|integer',
                    'is_stop_pro' => 'sometimes|integer',
                    'status' => 'sometimes|integer'
                ];
                break;
            case 'PATCH':
                return [
                    'goods_id' => [
                        'sometimes','integer',
                        Rule::exists('goods','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'spec_code' =>  [
                        'sometimes','string','max:255',
                        Rule::unique('product_specs')->ignore(isset($this->productspec->id)?$this->productspec->id:$id),
                    ],
                    'jd_specs_code' => 'sometimes|string|max:255',
                    'vips_specs_code' => 'sometimes|string|max:255',
                    'tb_price' => 'sometimes|numeric',
                    'cost' => 'sometimes|numeric',
                    'price' => 'sometimes|numeric',
                    'highest_price' => 'sometimes|numeric',
                    'lowest_price' => 'sometimes|numeric',
                    'warehouse_cost' => 'sometimes|numeric',
                    'assembly_price' => 'sometimes|numeric',
                    'discount' => 'sometimes|numeric',
                    'commission' => 'sometimes|numeric',
                    'is_combination' => 'sometimes|integer',
                    'package_quantity' => 'sometimes|integer',
                    'package_costs' => 'sometimes|numeric',
                    'wooden_frame_costs' => 'sometimes|numeric',
                    'purchase_freight' => 'sometimes|numeric',
                    'inventory_warning' => 'sometimes|numeric',
                    'purchase_days_warning' => 'sometimes|numeric',
                    'available_warning' => 'sometimes|numeric',
                    'distribution_method_id' => [
                        'sometimes','integer',
                        Rule::exists('distribution_methods','id')->where(function ($query) {
                            $query->where('status',1);
                        }),
                    ],
                    'bar_code' => 'sometimes|string|max:255',
                    'img_url' => 'sometimes|url|max:255',
                    'spec' => 'sometimes|string|max:255',
                    'color' => 'sometimes|string|max:255',
                    'materials' => 'sometimes|string|max:255',
                    'function' => 'sometimes|string|max:255',
                    'special' => 'sometimes|string|max:255',
                    'other' => 'sometimes|string|max:255',
                    'length' => 'sometimes|numeric',
                    'width' => 'sometimes|numeric',
                    'height' => 'sometimes|numeric',
                    'volume' => 'sometimes|numeric',
                    'weight' => 'sometimes|numeric',
                    'remark' => 'sometimes|string|nullable|max:255',
                    'finished_pro' => 'sometimes|integer',
                    'is_stop_pro' => 'sometimes|integer',
                    'status' => 'sometimes|integer',
                ];
                break;
            case 'DELETE':
                return [
                    'ids' => 'required|string',
                ];
                break;
            case 'PUT':
                return [
                    'ids' => 'required|string',
                    'status' => 'required|integer'
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

            'jd_specs_code.required' => '京东规格编码必填',
            'jd_specs_code.max' => '京东规格编码最大长度为255',
            'jd_specs_code.string' => '京东规格编码必须string类型',

            'vips_specs_code.required' => '唯品会规格编码必填',
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

            'warehouse_cost.required' => '仓库成本售价必填',
            'warehouse_cost.numeric' => '仓库成本售价必须是数字',

            'assembly_price.required' => '装配价格售价必填',
            'assembly_price.numeric' => '装配价格售价必须是数字',

            'discount.required' => '折扣必填',
            'discount.numeric' => '折扣必须是数字',

            'commission.required' => '金佣点必填',
            'commission.numeric' => '金佣点必须是数字',

            'is_combination.integer' => '是否组合必须int类型',

            'package_quantity.required' => '包件数量必填',
            'package_quantity.integer' => '包件数量必须int类型',

            'package_costs.required' => '打包费用必填',
            'package_costs.numeric' => '打包费用必须是数字',

            'wooden_frame_costs.required' => '木架费必填',
            'wooden_frame_costs.numeric' => '木架费用必须是数字',

            'purchase_freight.required' => '采购运费必填',
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

            'bar_code.required' => '条形码必填',
            'bar_code.max' => '条形码最大长度为255',
            'bar_code.string' => '条形码必须string类型',

            'img_url.required' => '图片地址必填',
            'img_url.max' => '图片地址最大长度为255',
            'img_url.url' => '图片地址必须有效的url',

            'spec.required' => '规格必填',
            'spec.max' => '规格最大长度为255',
            'spec.string' => '规格必须string类型',

            'color.required' => '颜色必填',
            'color.max' => '颜色最大长度为255',
            'color.string' => '颜色必须string类型',

            'materials.required' => '材质必填',
            'materials.max' => '材质最大长度为255',
            'materials.string' => '材质必须string类型',

            'function.required' => '功能必填',
            'function.max' => '功能最大长度为255',
            'function.string' => '功能必须string类型',

            'special.required' => '特殊必填',
            'special.max' => '特殊最大长度为255',
            'special.string' => '特殊必须string类型',

            'other.required' => '其他必填',
            'other.max' => '其他最大长度为255',
            'other.string' => '其他必须string类型',

            'length.required' => '长度（mm）必填',
            'length.numeric' => '长度（mm）必须是数字',

            'width.required' => '宽度（mm）必填',
            'width.numeric' => '宽度（mm）必须是数字',

            'height.required' => '高度（mm）必填',
            'height.numeric' => '高度（mm）必须是数字',

            'volume.required' => '体积(m²)必填',
            'volume.numeric' => '体积(m²)必须是数字',

            'weight.required' => '重量必填',
            'weight.numeric' => '重量必须是数字',

            'finished_pro.integer' => '是否成品 0=不是 1=是必须int类型',

            'is_stop_pro.integer' => '是否停产 0 不是 1 是必须int类型',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型',
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
