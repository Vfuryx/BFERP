<?php

namespace App\Models;

class Order extends Model
{
    protected $table = 'orders';

    const ORDER_STATUS_NEW = 10;
    const ORDER_STATUS_LOCK = 20;
    const ORDER_STATUS_CS_AUDIT = 30;
    const ORDER_STATUS_ONE_AUDIT = 40;
    const ORDER_STATUS_FD_AUDIT = 50;
    const ORDER_STATUS_CARGO_AUDIT = 60;
    const ORDER_STATUS_STOCK_OUT = 70;

    //退回
    const ORDER_RETURN_LOCK = 21;
    const ORDER_RETURN_CS_AUDIT = 31;
    const ORDER_RETURN_ONE_AUDIT = 41;
    const ORDER_RETURN_FD_TO_ONE_AUDIT = 51; //财务驳回跟单一审
    const ORDER_RETURN_FD_AUDIT = 52; //退回财审
    const ORDER_RETURN_CARGO_AUDIT = 61;
    const ORDER_RETURN_STOCK_OUT_TO_CS = 71; //打印退回客审

    //订单来源
    const ORDER_SOURCE_SYSTEM = 'system';
    const ORDER_SOURCE_TAOBAO = 'taobao';

    //计费方式
    const ORDER_BILLING_WAY_WEIGHT = 'weight';
    const ORDER_BILLING_WAY_VOLUME = 'volume';

    //订单状态
    public static $orderStatusMap = [
        self::ORDER_STATUS_NEW => '未处理',
        self::ORDER_STATUS_LOCK => '订单锁定',
        self::ORDER_STATUS_CS_AUDIT => '已客审',
        self::ORDER_STATUS_ONE_AUDIT => '已跟单一审',
        self::ORDER_STATUS_FD_AUDIT => '已财审',
        self::ORDER_STATUS_CARGO_AUDIT => '已货审',
        self::ORDER_STATUS_STOCK_OUT => '已出库'
    ];

    //订单操作
    public static $orderOperationMap = [
        self::ORDER_STATUS_NEW => '创建',
        self::ORDER_STATUS_LOCK => '锁定',
        self::ORDER_STATUS_CS_AUDIT => '客审',
        self::ORDER_STATUS_ONE_AUDIT => '跟单一审',
        self::ORDER_STATUS_FD_AUDIT => '财审',
        self::ORDER_STATUS_CARGO_AUDIT => '货审',
        self::ORDER_STATUS_STOCK_OUT => '出货',

        self::ORDER_RETURN_LOCK => '解锁',
        self::ORDER_RETURN_CS_AUDIT => '退回客审',
        self::ORDER_RETURN_ONE_AUDIT => '退回跟单一审',
        self::ORDER_RETURN_FD_TO_ONE_AUDIT => '驳回跟单一审',
        self::ORDER_RETURN_FD_AUDIT => '退回财审',
        self::ORDER_RETURN_CARGO_AUDIT => '退回货审',
        self::ORDER_RETURN_STOCK_OUT_TO_CS => '打印退回客审',

    ];

    //订单操作详情
    public static $orderOperationDescriptionMap = [
        self::ORDER_STATUS_NEW => '创建订单',
        self::ORDER_STATUS_LOCK => '锁定订单',
        self::ORDER_STATUS_CS_AUDIT => '客服审核',
        self::ORDER_STATUS_ONE_AUDIT => '跟单一次审核',
        self::ORDER_STATUS_FD_AUDIT => '财务审核',
        self::ORDER_STATUS_CARGO_AUDIT => '货物审核',
        self::ORDER_STATUS_STOCK_OUT => '打印出货单',

        self::ORDER_RETURN_LOCK => '解锁订单',
        self::ORDER_RETURN_CS_AUDIT => '客服退回客审',
        self::ORDER_RETURN_ONE_AUDIT => '跟单退回跟单一审',
        self::ORDER_RETURN_FD_TO_ONE_AUDIT => '财务驳回跟单一审',
        self::ORDER_RETURN_FD_AUDIT => '财务退回财审',
        self::ORDER_RETURN_CARGO_AUDIT => '退回货审',
        self::ORDER_RETURN_STOCK_OUT_TO_CS => '出货打印退回客审',
    ];

    //建单类型
    public static $orderSourceMap = [
        self::ORDER_SOURCE_SYSTEM => '系统建单',
        self::ORDER_SOURCE_TAOBAO => '淘宝商城',
    ];

    //计费方式
    public static $orderBillingWayMap = [
        self::ORDER_BILLING_WAY_WEIGHT => '按重量计算',
        self::ORDER_BILLING_WAY_VOLUME => '按体积计算',
    ];

    protected $fillable = [
        'shops_id', 'member_nick', 'logistics_id', 'billing_way', 'promise_ship_time',
        'freight_types_id', 'expected_freight', 'distributions_id', 'distribution_methods_id',
        'deliver_goods_fee', 'move_upstairs_fee', 'installation_fee', 'total_distribution_fee',
        'distribution_phone', 'distribution_no', 'distribution_types_id', 'service_car_info',
        'get_goods_fee', 'get_goods_ways_id', 'express_fee', 'service_car_fee', 'cancel_after_verification_code',
        'wooden_frame_costs', 'preferential_cashback', 'favorable_cashback', 'customer_types_id',
        'is_invoice', 'invoice_express_fee', 'express_invoice_title', 'contract_no', 'payment_methods_id',
        'deposit', 'document_title', 'warehouses_id', 'payment_date', 'interest_concessions', 'is_notice',
        'is_cancel_after_verification', 'accept_order_user', 'tax_number', 'receipt', 'logistics_remark',
        'seller_remark', 'customer_service_remark', 'buyer_message'
    ];

    protected $dates = [
        'created',
        'audit_at',
        'est_con_time',
        'audit_at',
    ];

    //设置类型
    protected $casts = [
        'is_invoice' => 'boolean',
        'is_notice' => 'boolean',
        'is_cancel_after_verification' => 'boolean',
        'is_merge' => 'boolean',
        'is_split' => 'boolean',
        'is_association' => 'boolean',
    ];

    public function shop(){
        return $this->belongsTo(Shop::class,'shops_id');
    }

    public function logistic(){
        return $this->belongsTo(Logistics::class,'logistics_id');
    }

    public function feeType(){
        return $this->belongsTo(FeeType::class,'freight_types_id');
    }

    public function distribution(){
        return $this->belongsTo(Distribution::class,'distributions_id');
    }

    public function distributionMethod(){
        return $this->belongsTo(DistributionMethod::class,'distribution_methods_id');
    }


}
