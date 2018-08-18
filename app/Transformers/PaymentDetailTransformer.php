<?php

namespace App\Transformers;

use App\Models\PaymentDetail;
use League\Fractal\TransformerAbstract;

class PaymentDetailTransformer extends TransformerAbstract
{


    public function transform(PaymentDetail $paymentDetail)
    {
        return [
            'id' => $paymentDetail->id,
            'orders_id' => $paymentDetail->orders_id,
            'payment' => $paymentDetail->payment,
            'taobao_tid' => $paymentDetail->taobao_tid,
            'taobao_oid' => $paymentDetail->taobao_oid,
            'pay_time' => $paymentDetail->pay_time->toDateString(),
            'remark' => $paymentDetail->remark,
            'created_at' => $paymentDetail->created_at
                                  ->toDateTimeString(),
            'updated_at' => $paymentDetail->updated_at
                                  ->toDateTimeString()
        ];
    }

}