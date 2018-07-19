<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class PurchaseRequest extends FormRequest
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
                    'purchase_status' => 'required|string|in:新建',
                    'receiver' => 'required|string|max:255',
                    'receiver_address' => 'required|string|max:255',
                    'warehouse_id' => [
                        'required', 'integer',
                        Rule::exists('warehouses', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'remark' => 'string|nullable|max:255',
                    'status' => 'integer',
                    'purchase_details' => 'json'
                ];
                break;
            case 'PATCH':
                $publicRule = $this->publicRule($this->purchase->status == 1 && $this->purchase->is_submit == 0);
                return [
                    'receiver' => ['string', 'max:255',],
                    'receiver_address' => ['string', 'max:255', $publicRule],
                    'warehouse_id' => [
                        'integer',
                        Rule::exists('warehouses', 'id')->where(function($query) {
                            $query->where('status', 1);
                        }),
                        $publicRule
                    ],
                    'remark' => ['string', 'nullable', 'max:255', $publicRule],
                    'status' => ['integer', $publicRule]
                ];
                break;
            case 'DELETE':
                return [
                    'ids' => 'required|string',
                ];
                break;
            case 'PUT':
                switch ($this->route()->getActionMethod()) {
                    case 'isSubmit':
                        return [
                            'is_submit' => [
                                'required', 'boolean',
                                $this->publicRule($this->purchase->status == 1 && $this->purchase->is_submit == 0)
                            ]
                        ];
                        break;
                    case 'isPrint':
                        return [
                            'is_print' => [
                                'required', 'boolean',
                                $this->publicRule($this->purchase->status == 1 && $this->purchase->is_submit == 1 && $this->purchase->is_print == 0)
                            ]
                        ];
                        break;
                    case 'isCheck':
                        return [
                            'is_check' => [
                                'required', 'boolean',
                                $this->publicRule($this->purchase->status == 1 && $this->purchase->is_submit == 1 && $this->purchase->is_check == 0)
                            ]
                        ];
                        break;
                    default:
                        return [
                            'ids' => 'required|string',
                            'status' => [
                                'integer',
                                $this->publicRule($this->purchase->is_submit == 0)
                            ]
                        ];
                        break;
                }
                break;
        }
    }

    public
    function messages()
    {
        return [
            'purchase_status.required' => '采购状态必填',
            'purchase_status.string' => '采购状态必须string类型',
            'purchase_status.in' => '采购状态必须为新建',

            'receiver.required' => '收货人必填',
            'receiver.string' => '收货人必须string类型',
            'receiver.max' => '收货人最大长度为255',

            'receiver_address.required' => '收货地址必填',
            'receiver_address.string' => '收货地址必须string类型',
            'receiver_address.max' => '收货地址最大长度为255',

            'warehouse_id.required' => '仓库id必填',
            'warehouse_id.integer' => '仓库id必须int类型',
            'warehouse_id.exists' => '需要添加的id在数据库中未找到或未启用',

            'remark.string' => '备注必须string类型',
            'remark.nullable' => '备注可为null',
            'remark.max' => '备注最大长度为255',

            'status.required' => '状态必填',
            'status.integer' => '状态必须int类型',
            'id.exists' => '需要更改的数据id在数据库中未找到',
            'ids.required' => 'id组必填',
            'ids.string' => 'id组必须string类型',

            'is_submit.required' => '是否提交必填',
            'is_submit.boolean' => '是否提交必须布尔类型',

            'isPrint.required' => '是否打印必填',
            'isPrint.boolean' => '是否打印必须布尔类型',

            'is_check.required' => '是否审核必填',
            'is_check.boolean' => '是否审核必须布尔类型',

            'purchase_details' => '采购订单详情必须json类型'
        ];
    }

    public
    function attributes()
    {
        return [
            'purchase_order_no' => '采购单号',
            'purchase_status' => '采购状态:新建、部分完成、已完成',
            'order_no' => '订单编号',
            'user_id' => '创建人',
            'receiver' => '收货人',
            'receiver_address' => '收货地址',
            'warehouse_id' => '仓库id',
            'print_at' => '打印时间',
            'check_at' => '审核时间',
            'promise_delivery_time' => '承诺发货时间',
            'salesman' => '原订单业务员',
            'source' => '采购单来源',
            'client_name' => '客户名',
            'buyer_nick' => '卖家昵称',
            'order_address' => '订单地址',
            'is_submit' => '是否提交',
            'is_print' => '是否打印',
            'is_check' => '是否审核',
            'is_change' => '是否修改',
            'remark' => '备注',
            'status' => '状态：0=停用，1=启用',
        ];
    }

    /**
     * 通用规则
     * @param bool $condition   判断的条件
     * @param string $text      返回的信息
     * @return \Closure         闭包
     */
    public function publicRule($condition = true, $text = '需要更改错误确认数据的准确性，例如数据是否已启用、不可修改')
    {
        return function($attribute, $value, $fail) use ($condition, $text) {
            if ($condition) {
                return true;
            }
            return $fail($text);
        };
    }

}
