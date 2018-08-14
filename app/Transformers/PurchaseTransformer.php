<?php

namespace App\Transformers;

use App\Models\Purchase;
use League\Fractal\TransformerAbstract;

class PurchaseTransformer extends TransformerAbstract
{
    public function transform(Purchase $purchase)
    {
//        $data = [
//            'id' => $purchase->id,
//            'purchase_order_no' => $purchase->purchase_order_no,
//            'purchase_status' => $purchase->purchase_status,
//            'order_no' => $purchase->order_no,
//            'user_id' => $purchase->user_id,
//            'print_at' => $purchase->print_at,
//            'receiver' => $purchase->receiver,
//            'receiver_address' => $purchase->receiver_address,
//            'warehouse_id' => $purchase->warehouse_id,
//            'promise_ship_time' => $purchase->promise_ship_time,
//            'business_personnel' => $purchase->business_personnel,
//            'source' => $purchase->source,
//            'client_name' => $purchase->client_name,
//            'buyer_nick' => $purchase->buyer_nick,
//            'order_address' => $purchase->order_address,
//            'is_submit' => $purchase->is_submit,
//            'is_print' => $purchase->is_print,
//            'is_audit' => $purchase->is_audit,
//            'is_change' => $purchase->is_change,
//            'remark' => $purchase->remark,
//            'status' => $purchase->status,
//            'created_at' => $purchase->created_at->toDateTimeString(),
//        ];
//
//        if (request()->route()->getActionMethod() != 'index') {
//            //提取 采购列表 和 采购明细 数据
//            $purchaseLists = $purchase->load('purchaseLists.productSpec', 'purchaseLists.purchaseDetails');
//
//            $purchaseLists = $purchaseLists->purchaseLists->map(function($item) {
//                $data['id'] = $item->id;
//                $data['product_specs_id'] = $item->product_specs_id;
//                $data['product_specs_spec_code'] = $item->productSpec->spec_code;
//                $data['product_specs_spec'] = $item->productSpec->spec;
//                $data['goods_short_name'] = $item->productSpec->goods->short_name;
//                $data['goods_commodity_code'] = $item->productSpec->goods->commodity_code;
//                $data['stock_in_count'] = $item->stock_in_count;
//                $data['suppliers_id'] = $item->suppliers_id;
//                $data['suppliers_name'] = $item->supplier->name;
//                $data['shops_id'] = $item->shops_id;
//                $data['shop_title'] = $item->shop->title;
//                $data['purchase_quantity'] = $item->purchase_quantity;
//                $data['purchase_cost'] = $item->purchase_cost;
//                $data['purchase_freight'] = $item->purchase_freight;
//                $data['warehouse_cost'] = $item->warehouse_cost;
//                $data['commission'] = $item->commission;
//                $data['discount'] = $item->discount;
//                $data['wooden_frame_costs'] = $item->wooden_frame_costs;
//                $data['arrival_time'] = $item->arrival_time;
//                $data['remark'] = $item->remark;
//                $data['purchase_details'] = $item->purchaseDetails->map(function($item) {
//                    $data['id'] = $item->id;
//                    $data['product_specs_id'] = $item->product_specs_id;
//                    $data['product_specs_spec_code'] = $item->productSpec->spec_code;
//                    $data['product_specs_spec'] = $item->productSpec->spec;
//                    $data['goods_short_name'] = $item->productSpec->goods->short_name;
//                    $data['goods_commodity_code'] = $item->productSpec->goods->commodity_code;
//                    $data['suppliers_id'] = $item->suppliers_id;
//                    $data['suppliers_name'] = $item->supplier->name;
//                    $data['shops_id'] = $item->shops_id;
//                    $data['shop_title'] = $item->shop->title;
//                    $data['purchase_quantity'] = $item->purchase_quantity;
//                    $data['purchase_cost'] = $item->purchase_cost;
//                    $data['purchase_freight'] = $item->purchase_freight;
//                    $data['warehouse_cost'] = $item->warehouse_cost;
//                    $data['commission'] = $item->commission;
//                    $data['discount'] = $item->discount;
//                    $data['wooden_frame_costs'] = $item->wooden_frame_costs;
//                    $data['arrival_time'] = $item->arrival_time;
//                    $data['remark'] = $item->remark;
//                    return $data;
//                });
//                return $data;
//            });
//
//            $data = array_merge($data, ['purchase_lists' => $purchaseLists]);
//        }

        $purchase = $purchase->load('purchaseLists.purchaseDetails');
        return [
            'id' => $purchase->id,
            'purchase_order_no' => $purchase->purchase_order_no,
            'purchase_status' => $purchase->purchase_status,
            'order_no' => $purchase->order_no,
            'user_id' => $purchase->user_id,
            'print_at' => $purchase->print_at,
            'receiver' => $purchase->receiver,
            'receiver_address' => $purchase->receiver_address,
            'warehouse_id' => $purchase->warehouse_id,
            'promise_ship_time' => $purchase->promise_ship_time,
            'business_personnel' => $purchase->business_personnel,
            'source' => $purchase->source,
            'client_name' => $purchase->client_name,
            'buyer_nick' => $purchase->buyer_nick,
            'order_address' => $purchase->order_address,
            'is_submit' => $purchase->is_submit,
            'is_print' => $purchase->is_print,
            'is_audit' => $purchase->is_audit,
            'is_change' => $purchase->is_change,
            'remark' => $purchase->remark,
            'status' => $purchase->status,
            'purchase_lists' => $purchase->purchaseLists
        ];
    }
}