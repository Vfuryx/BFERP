<?php

namespace App\Transformers;

use App\Models\ReturnOrder;
use League\Fractal\TransformerAbstract;

class ReturnOrderTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'order', 'shop', 'customerService', 'returnReason', 'refundPaymentMethod',
        'logistics', 'freightType', 'distribution', 'returnOrderItem', 'personliable'
    ];

    public function transform(ReturnOrder $returnOrder)
    {
        return [
            'id' => $returnOrder->id,
            'return_sn' => $returnOrder->return_sn,
            'return_order_status' => $returnOrder->return_order_status,
            'shops_id' => $returnOrder->shops_id,
            'orders_id' => $returnOrder->orders_id,
            'member_nick' => $returnOrder->member_nick,
            'customer_name' => $returnOrder->customer_name,
            'customer_phone' => $returnOrder->customer_phone,
            'customer_service_id' => $returnOrder->customer_service_id,
            'deposit' => $returnOrder->deposit,
            'return_reasons_id' => $returnOrder->return_reasons_id,
            'customer_address' => $returnOrder->customer_address,
            'is_scour' => $returnOrder->is_scour,
            'expected_arrival_time' => optional($returnOrder->expected_arrival_time)->toDateTimeString(),
            'payee' => $returnOrder->payee,
            'refund_account' => $returnOrder->refund_account,
            'refund_payment_methods_id' => $returnOrder->refund_payment_methods_id,
            'refund_amount' => $returnOrder->refund_amount,
            'logistics_id' => $returnOrder->logistics_id,
            'freight_types_id' => $returnOrder->freight_types_id,
            'freight' => $returnOrder->freight,
            'logistics_sn' => $returnOrder->logistics_sn,
            'take_delivery_goods_address' => $returnOrder->take_delivery_goods_address,
            'logistics_remark' => $returnOrder->logistics_remark,
            'follow_up' => $returnOrder->follow_up,
            'distributions_id' => $returnOrder->distributions_id,
            'pulling_cost' => $returnOrder->pulling_cost,

            'person_liable_id' => $returnOrder->person_liable_id,
            'liable_fee' => $returnOrder->liable_fee,
            'as_remark' => $returnOrder->as_remark,

            'status' => $returnOrder->status,
            'created_at' => $returnOrder->created_at
                                  ->toDateTimeString(),
            'updated_at' => $returnOrder->updated_at
                                  ->toDateTimeString()
        ];
    }

    public function includeOrder(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->order) return ;
        return $this->item($returnOrder->order, new OrderTransformer());
    }

    public function includeShop(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->shop) return ;
        return $this->item($returnOrder->shop, new ShopTransformer());
    }

    public function includeCustomerService(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->customerService) return ;
        return $this->item($returnOrder->customerService, new UserTransformer());
    }

    public function includeReturnReason(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->returnReason) return ;
        return $this->item($returnOrder->returnReason, new ReturnReasonTransformer());
    }

    public function includeRefundPaymentMethod(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->refundPaymentMethod) return ;
        return $this->item($returnOrder->refundPaymentMethod, new PaymentMethodTransformer());
    }

    public function includeLogistics(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->logistics) return ;
        return $this->item($returnOrder->logistics, new LogisticsTransformer());
    }

    public function includeFreightType(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->freightType) return ;
        return $this->item($returnOrder->freightType, new FreightTypeTransformer());
    }

    public function includeDistribution(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->distribution) return ;
        return $this->item($returnOrder->distribution, new DistributionTransformer());
    }

    public function includePersonliable(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->personliable) return ;
        return $this->item($returnOrder->personliable, new UserTransformer());
    }

    public function includeReturnOrderItem(ReturnOrder $returnOrder)
    {
        if(!$returnOrder->personliable) return ;
        return $this->collection($returnOrder->returnOrderItem, new ReturnOrderItemTransformer());
    }





}