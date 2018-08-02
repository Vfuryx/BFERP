<?php

namespace App\Models;

class Order extends Model
{
    protected $table = 'orders';

    const ORDER_STATUS_NEW = 1;
    const ORDER_STATUS_LOCK = 2;
    const ORDER_STATUS_CS_AUDIT = 3;
    const ORDER_STATUS_ONE_AUDIT = 4;
    const ORDER_STATUS_FD_AUDIT = 5;
    const ORDER_STATUS_CARGO_AUDIT = 6;
    const ORDER_STATUS_STOCK_OUT = 7;
    //退回
    const ORDER_RETURN_LOCK = 21;
    const ORDER_RETURN_CS_AUDIT = 31;
    const ORDER_RETURN_ONE_AUDIT = 41;
    const ORDER_RETURN_FD_TO_ONE_AUDIT = 51; //财务驳回跟单一审
    const ORDER_RETURN_FD_AUDIT = 52; //退回财审
    const ORDER_RETURN_CARGO_AUDIT = 61;
    const ORDER_RETURN_STOCK_OUT_TO_CS = 71; //打印退回客审


    public static $orderStatusMap = [
        self::ORDER_STATUS_NEW => '未处理',
        self::ORDER_STATUS_LOCK => '订单锁定',
        self::ORDER_STATUS_CS_AUDIT => '已客审',
        self::ORDER_STATUS_ONE_AUDIT => '已跟单一审',
        self::ORDER_STATUS_FD_AUDIT => '已财审',
        self::ORDER_STATUS_CARGO_AUDIT => '已货审',
        self::ORDER_STATUS_STOCK_OUT => '已出库'
    ];

    public static $orderOperationMap = [
        self::ORDER_STATUS_NEW => '创建',
        self::ORDER_STATUS_LOCK => '锁定',
        self::ORDER_STATUS_CS_AUDIT => '客审',
        self::ORDER_STATUS_ONE_AUDIT => '跟单一审',
        self::ORDER_STATUS_FD_AUDIT => '财审',
        self::ORDER_STATUS_CARGO_AUDIT => '货审',
        self::ORDER_STATUS_STOCK_OUT => '出货',

    ];

    public static $orderOperationDescriptionMap = [
        self::ORDER_STATUS_NEW => '创建订单',
        self::ORDER_STATUS_LOCK => '锁定订单',
        self::ORDER_STATUS_CS_AUDIT => '客服审核',
        self::ORDER_STATUS_ONE_AUDIT => '跟单一次审核',
        self::ORDER_STATUS_FD_AUDIT => '财务审核',
        self::ORDER_STATUS_CARGO_AUDIT => '货物审核',
        self::ORDER_STATUS_STOCK_OUT => '打印出货单',

    ];



    protected $fillable = [];

}
