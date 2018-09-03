<?php

namespace App\Transformers;

use App\Models\RefundOrder;
use League\Fractal\TransformerAbstract;

class RefundOrderTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'paymentMethod', 'shop', 'refundPaymentMethod', 'returnReason', 'businessPersonnel',
        'locker', 'afterSale', 'financial', 'creator'

    ];

    public function transform(RefundOrder $refundOrder)
    {
        return [
            'id' => $refundOrder->id,
            'refund_sn' => $refundOrder->refund_sn,
            'order_sn' => $refundOrder->order_sn,
            'refund_order_status' => $refundOrder->refund_order_status,
            'order_source' => $refundOrder->order_source,
            'payment_methods_id' => $refundOrder->payment_methods_id,
            'time_out_at' => $refundOrder->time_out_at,
            'shops_id' => $refundOrder->shops_id,
            'account' => $refundOrder->account,
            'refund_payment_methods_id' => $refundOrder->refund_payment_methods_id,
            'bank' => $refundOrder->bank,
            'address' => $refundOrder->address,
            'refund_amount' => $refundOrder->refund_amount,
            'transaction_sn' => $refundOrder->transaction_sn,
            'return_reasons_id' => $refundOrder->return_reasons_id,
            'seller_nick' => $refundOrder->seller_nick,
            'seller_name' => $refundOrder->seller_name,
            'payment' => $refundOrder->payment,
            'person_liable' => $refundOrder->person_liable,
            'liable_fee' => $refundOrder->liable_fee,
            'undertaker' => $refundOrder->undertaker,
            'business_remark' => $refundOrder->business_remark,
            'as_remark' => $refundOrder->as_remark,
            'f_remark' => $refundOrder->f_remark,
            'refund_description' => $refundOrder->refund_description,
            'taobao_refund_status' => $refundOrder->taobao_refund_status,
            'creator_id' => $refundOrder->creator_id,
            'business_personnel_id' => $refundOrder->business_personnel_id,
            'cs_audit_at' => optional($refundOrder->cs_audit_at)->toDateTimeString(),
            'locker_id' => $refundOrder->locker_id,
            'after_sales_id' => $refundOrder->after_sales_id,
            'as_audit_at' => optional($refundOrder->as_audit_at)->toDateTimeString(),
            'financial_id' => $refundOrder->financial_id,
            'f_audit_at' => optional($refundOrder->f_audit_at)->toDateTimeString(),
            'status' => $refundOrder->status,
            'created_at' => $refundOrder->created_at
                                  ->toDateTimeString(),
            'updated_at' => $refundOrder->updated_at
                                  ->toDateTimeString()
        ];
    }

    public function includePaymentMethod(RefundOrder $refundOrder)
    {
        return $this->item($refundOrder->paymentMethod, new PaymentMethodTransformer());
    }

    public function includeShop(RefundOrder $refundOrder)
    {
        return $this->item($refundOrder->shop, new ShopTransformer());
    }

    public function includeRefundPaymentMethod(RefundOrder $refundOrder)
    {
        return $this->item($refundOrder->refundPaymentMethod, new PaymentMethodTransformer());
    }

    public function includeReturnReason(RefundOrder $refundOrder)
    {
        return $this->item($refundOrder->returnReason, new ReturnReasonTransformer());
    }

    public function includeCreator(RefundOrder $refundOrder)
    {
        if(!$refundOrder->creator) return ;
        return $this->item($refundOrder->creator, new UserTransformer());
    }

    public function includeBusinessPersonnel(RefundOrder $refundOrder)
    {
        if(!$refundOrder->businessPersonnel) return ;
        return $this->item($refundOrder->businessPersonnel, new UserTransformer());
    }

    public function includeLocker(RefundOrder $refundOrder)
    {
        if(!$refundOrder->locker) return ;
        return $this->item($refundOrder->locker, new UserTransformer());
    }

    public function includeAfterSale(RefundOrder $refundOrder)
    {
        if(!$refundOrder->afterSale) return ;
        return $this->item($refundOrder->afterSale, new UserTransformer());
    }

    public function includeFinancial(RefundOrder $refundOrder)
    {
        if(!$refundOrder->afterSale) return ;
        return $this->item($refundOrder->afterSale, new UserTransformer());
    }

}