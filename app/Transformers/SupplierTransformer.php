<?php

namespace App\Transformers;

use App\Models\Supplier;
use League\Fractal\TransformerAbstract;

class SupplierTransformer extends TransformerAbstract
{
    public function transform(Supplier $supplier)
    {
        return [
            'id' => $supplier->id,
            'name' => $supplier->name,
            'company' => $supplier->company,
            'code' => $supplier->code,
            'province' => $supplier->province,
            'city' => $supplier->city,
            'district' => $supplier->district,
            'address' => $supplier->address,
            'zipcode' => $supplier->zipcode,
            'contacts' => $supplier->contacts,
            'phone' => $supplier->phone,
            'mobile' => $supplier->mobile,
            'fax' => $supplier->fax,
            'email' => $supplier->email,
            'remark' => $supplier->remark,
            'is_scan' => $supplier->is_scan,
            'status' => $supplier->status,
            'auto_valuation' => $supplier->auto_valuation,
            'created_at' => $supplier->created_at
                                    ->toDateTimeString(),
            'updated_at' => $supplier->updated_at
                                    ->toDateTimeString(),
        ];
    }
}