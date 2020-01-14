<?php

namespace App\Transformers;

use App\Models\PurchaseReturn;
use League\Fractal\TransformerAbstract;

class PurchaseReturnTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'purchaseReturnDetails'
    ];

    public function transform(PurchaseReturn $purchaseReturn)
    {
        return [
            'id' => $purchaseReturn->id,
            'purchase_return_no' => $purchaseReturn->purchase_return_no,
            'creator' => $purchaseReturn->creator,
            'is_submit' => $purchaseReturn->is_submit,
            'submitter' => $purchaseReturn->submitter,
            'submit_at' => $purchaseReturn->submit_at,
            'is_audit' => $purchaseReturn->is_audit,
            'auditor' => $purchaseReturn->auditor,
            'audit_at' => $purchaseReturn->audit_at,
            'is_print' => $purchaseReturn->is_print,
            'remark' => $purchaseReturn->remark,
            'status' => $purchaseReturn->status,
            'created_at' => $purchaseReturn->created_at
                                    ->toDateTimeString(),
            'updated_at' => $purchaseReturn->updated_at
                                    ->toDateTimeString(),
        ];
    }

    public function includePurchaseReturnDetails(PurchaseReturn $purchaseReturn)
    {
        return $this->collection($purchaseReturn->purchaseReturnDetails, new PurchaseReturnDetailTransformer());
    }
}