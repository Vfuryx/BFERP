<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     * 订单表
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('system_order_no')->comment('系统单号');
            $table->unsignedInteger('order_status')->default(1)->comment('订单状态');
            $table->string('order_source')->comment('订单来源');
            $table->unsignedInteger('shops_id')->comment('店铺id');
            $table->unsignedInteger('logistics_id')->comment('物流id');
            $table->unsignedInteger('billing_way')->comment('计费方式(按重量计算：weight ，按体积计算 volume)');
            $table->date('promise_ship_time')->nullable()->comment('承诺发货时间（订单生成）');
            $table->unsignedInteger('freight_types_id')->comment('运费类型id');
            $table->decimal('expected_freight', 10 ,2)->default(0.00)->comment('预计运费');
            $table->unsignedInteger('distributions_id')->default(0)->comment('配送id');
            $table->unsignedInteger('distribution_methods_id')->comment('配送方式');
            $table->decimal('deliver_goods_fee', 10 ,2)->default(0.00)->comment('送货费用');
            $table->decimal('move_upstairs_fee', 10 ,2)->default(0.00)->comment('搬楼费用');
            $table->decimal('installation_fee', 10 ,2)->default(0.00)->comment('安装费');
            $table->decimal('total_distribution_fee', 10 ,2)->default(0.00)->comment('配送总计(送货费用 + 搬楼费用 + 安装费)');
            $table->string('distribution_phone')->default('')->comment('配送电话');
            $table->string('distribution_no')->default('')->comment('配送单号');
            $table->unsignedInteger('distribution_types_id')->comment('配送类型id');
            $table->string('service_car_info')->default('')->comment('服务车信息（配送信息）');
            $table->decimal('get_goods_fee', 10 ,2)->default(0.00)->comment('提货费用');
            $table->unsignedInteger('get_goods_ways_id')->default(0)->comment('提货方式');
            $table->decimal('express_fee', 10 ,2)->default(0.00)->comment('快递费用');
            $table->decimal('service_car_fee', 10 ,2)->default(0.00)->comment('服务车金额（家装服务）');
            $table->string('cancel_after_verification_code')->default('')->comment('核销码');
            $table->decimal('wooden_frame_costs',10,2)->default(0.00)->comment('木架费');
            $table->decimal('preferential_cashback',10,2)->default(0.00)->comment('优惠返现');
            $table->decimal('favorable_cashback',10,2)->default(0.00)->comment('好评返现');
            $table->unsignedInteger('customer_types_id')->default(0.00)->comment('客户类型');
            $table->boolean('is_invoice')->default(false)->comment('是否要发票');
            $table->decimal('invoice_express_fee',10,2)->default(0.00)->comment('发票快递费');
            $table->string('express_invoice_title')->default('')->comment('快递发票抬头');
            $table->string('contract_no')->default('')->comment('合同单号');
            $table->unsignedInteger('payment_methods_id')->comment('付款方式');
            $table->decimal('deposit',10,2)->default(0.00)->comment('订金');
            $table->string('document_title')->comment('单据头');
            $table->unsignedInteger('warehouses_id')->comment('发货仓库id');
            $table->date('payment_date')->nullable()->comment('支付日期');
            $table->decimal('interest_concessions')->default(0.00)->comment('让利');
            $table->boolean('is_notice')->default(false)->comment('等通知发货 0 否 1 是');
            $table->boolean('is_cancel_after_verification')->default(false)->comment('是否核销 0 否 1 是');
            $table->string('accept_order_user')->default('')->comment('接单用户');
            $table->string('tax_number')->default('')->comment('税号');
            $table->string('receipt')->default('')->comment('收据');
            $table->string('logistics_remark')->default('')->comment('物流备注');
            $table->string('seller_remark')->default('')->comment('卖家备注');
            $table->string('customer_service_remark')->default('')->comment('客服备注');

            //淘宝订单信息
            $table->unsignedBigInteger('taobao_oid')->default(0)->comment('淘宝单号');
            $table->unsignedBigInteger('taobao_tid')->default(0)->comment('交易号（获取淘宝的交易编号）');
            $table->string('member_nick')->comment('会员昵称（对应淘宝买家昵称一类）');
            $table->string('shop_name')->default('')->comment('店铺名称');
            $table->string('seller_name')->default('')->comment('卖家昵称');
            $table->tinyInteger('seller_flag')->default(0)->comment('卖家备注旗帜（与淘宝网上订单的卖家备注旗帜对应，只有卖家才能查看该字段）红、黄、绿、蓝、紫 分别对应 1、2、3、4、5');
            $table->timestamp('created')->nullable()->comment('(下单时间)交易创建时间');
            $table->timestamp('pay_time')->nullable()->comment('付款时间');
            $table->timestamp('est_con_time')->nullable()->comment('(商家的预计发货时间)');
            $table->decimal('payment',10,2)->comment('实付金额');
            $table->decimal('total_fee',10,2)->comment('商品金额（商品价格乘以数量的总金额）');
            $table->decimal('discount_fee',10,2)->comment('优惠金额');
            $table->string('buyer_message')->default('')->comment('买家留言');

            //收货详情
            $table->string('receiver_name')->default('')->comment('收货人');
            $table->string('receiver_phone')->default('')->comment('收货人固定电话');
            $table->string('receiver_mobile')->default('')->comment('收货人手机');
            $table->string('receiver_state')->default('')->comment('收货人的所在省份');
            $table->string('receiver_city')->default('')->comment('收货人的所在城市');
            $table->string('receiver_district')->default('')->comment('收货人的所在地区');
            $table->string('receiver_address')->default('')->comment('收货人的详细地址');
            $table->string('receiver_zip')->default('')->comment('收货邮编');

            //不知名字段
            $table->string('refund_info')->default('无退款')->comment('退款信息');

            //要记录的字段
            $table->string('business_personnel_name')->comment('业务员名称 (解锁后这里要清除)');
            $table->string('business_personnel_account')->comment('业务员账号 (解锁后这里要清除)');
            $table->string('locker_name')->comment('锁定人名称 (解锁后这里要清除)');
            $table->string('locker_account')->comment('锁定人账号 (解锁后这里要清除)');
            $table->timestamp('audit_at')->nullable()->comment('客服审核时间');

            //拼接
            $table->string('association_taobao_oid')->default('')->comment('单号关联');
            //操作
            $table->boolean('is_merge')->default(false)->comment('是否合并');
            $table->boolean('is_split')->default(false)->comment('是否拆分');
            $table->boolean('is_association')->default(false)->comment('是否关联订单');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
