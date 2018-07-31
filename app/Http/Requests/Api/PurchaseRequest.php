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
                    'status' => 'integer',
                    'purchase_status' => Rule::in([
                        \App\Models\Purchase::PURCHASE_STATUS_NEW,
                        \App\Models\Purchase::PURCHASE_STATUS_SECTION,
                        \App\Models\Purchase::PURCHASE_STATUS_FINISH]),
                ];
                break;
            case 'POST':
                return [
                    'receiver' => 'required|string|max:255',
                    'receiver_address' => 'required|string|max:255',
                    'warehouse_id' => [
                        'required', 'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        }),
                    ],
                    'remark' => 'string|nullable|max:255',
                    'status' => 'integer',
                ];
                break;
            case 'PATCH':
                return [
                    'receiver' => ['string', 'max:255', ],
                    'receiver_address' => ['string', 'max:255'],
                    'warehouse_id' => [
                        'integer',
                        Rule::exists('warehouses', 'id')->where(function ($query) {
                            $query->where('status', 1);
                        })
                    ],
                    'remark' => ['string', 'nullable', 'max:255'],
                    'status' => ['integer' ],
                ];
                break;
        }
    }

    public
        function messages()
    {
        return [
            'purchase_status.in' => '采购状态必须是：新建、部分完成、已完成',

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

        ];
    }

    public
        function attributes()
    {
        return [
            'purchase_order_no' => '采购单号',
            'order_no' => '订单编号',
            'user_id' => '创建人',
            'receiver' => '收货人',
            'receiver_address' => '收货地址',
            'warehouse_id' => '仓库id',
            'print_at' => '打印时间',
            'audit_at' => '审核时间',
            'promise_ship_time' => '承诺发货时间',
            'business_personnel' => '原订单业务员',
            'source' => '采购单来源',
            'client_name' => '客户名',
            'buyer_nick' => '卖家昵称',
            'order_address' => '订单地址',
            'is_submit' => '是否提交',
            'is_print' => '是否打印',
            'is_audit' => '是否审核',
            'is_change' => '是否修改',
            'remark' => '备注',
            'status' => '状态：0=停用，1=启用',
        ];
    }


}
