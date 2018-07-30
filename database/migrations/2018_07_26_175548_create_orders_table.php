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
            $table->string('order_source')->comment('订单来源');
            $table->string('system_order_no')->comment('系统订单号');
            $table->string('member_nick')->comment('会员昵称（对应淘宝买家昵称一类）');
            $table->string('business_personnel')->comment('业务员');
            $table->unsignedInteger('logistics_id')->comment('物流id');
            $table->unsignedInteger('billing_way')->comment('计费方式(按重量计算：weight ，按体积计算 volume)');
            $table->date('promise_ship_time')->nullable()->comment('承诺发货时间（订单生成）');
            $table->unsignedInteger('freight_types_id')->comment('运费类型id');
            $table->decimal('expected_freight', 10 ,2)->default(0.00)->comment('预计运费');
            $table->unsignedInteger('distribution_methods_id')->comment('配送方式');
            $table->decimal('deliver_goods_fee', 10 ,2)->default(0.00)->comment('送货费用');
            $table->decimal('move_upstairs_fee', 10 ,2)->default(0.00)->comment('搬楼费用');
            $table->decimal('installation_fee', 10 ,2)->default(0.00)->comment('安装费');
            $table->decimal('total_distribution_fee', 10 ,2)->default(0.00)->comment('配送总计(送货费用 + 搬楼费用 + 安装费)');
            $table->string('distribution_phone')->default('')->comment('配送电话');
            $table->string('distribution_no')->default('')->comment('配送单号');
            $table->unsignedInteger('distribution_types_id')->comment('配送类型id');
            $table->string('distribution_info')->default('')->comment('配送信息');
            $table->decimal('get_goods_fee', 10 ,2)->default(0.00)->comment('提货费用');
            $table->unsignedInteger('get_goods_ways_id')->default(0)->comment('提货方式');
            $table->decimal('express_fee', 10 ,2)->default(0.00)->comment('快递费用');
            $table->decimal('home_improvement_service', 10 ,2)->default(0.00)->comment('家装服务');
            $table->string('cancel_after_verification_code')->default('')->comment('核销码');
            $table->decimal('wooden_frame_costs',10,2)->default(0.00)->comment('木架费');
            $table->decimal('preferential_cashback',10,2)->default(0.00)->comment('优惠返现');
            $table->decimal('favorable_cashback',10,2)->default(0.00)->comment('好评返现');
            $table->unsignedInteger('customer_types_id')->default(0.00)->comment('客户类型');
            $table->tinyInteger('is_invoice')->default(0)->comment('是否要发票');
            $table->decimal('invoice_express_fee',10,2)->default(0.00)->comment('发票快递费');
            $table->string('express_invoice_title')->default('')->comment('快递发票抬头');
            $table->string('contract_no')->default('')->comment('合同单号');
            $table->unsignedInteger('payment_methods_id')->comment('付款方式');
            $table->decimal('deposit',10,2)->default(0.00)->comment('订金');
            $table->string('document_title')->comment('单据头');
            $table->unsignedInteger('warehouses_id')->comment('发货仓库id');
            $table->date('payment_date')->nullable()->comment('支付日期');
            $table->decimal('interest_concessions')->default(0.00)->comment('让利');
            $table->tinyInteger('is_notice')->default(0)->comment('等通知发货 0 否 1 是');
            $table->tinyInteger('is_cancel_after_verification')->default(0)->comment('是否核销 0 否 1 是');
            $table->string('accept_order_user')->default('')->comment('接单用户');
            $table->string('tax_number')->default('')->comment('税号');
            $table->string('receipt')->default('')->comment('收据');
            $table->string('logistics_remark')->default('')->comment('物流备注');
            $table->string('buyer_message')->default('')->comment('买家留言');
            $table->string('seller_remark')->default('')->comment('卖家备注');
            $table->string('customer_service')->default('')->comment('客服');
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
