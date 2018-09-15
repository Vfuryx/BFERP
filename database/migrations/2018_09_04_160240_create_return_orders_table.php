<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnOrdersTable extends Migration
{
    /**
     * Run the migrations.
     * 退货订单
     * @return void
     */
    public function up()
    {
        Schema::create('return_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('return_sn')->comment('退货单号');
            $table->unsignedInteger('orders_id')->comment('订单id');
            $table->unsignedInteger('return_order_status')->comment('订单状态');
            $table->unsignedInteger('shops_id')->comment('店铺id');
            $table->string('member_nick')->default('')->comment('会员昵称');
            $table->string('customer_name')->default('')->comment('客户姓名');
            $table->string('customer_phone')->default('')->comment('客户电话');
            $table->unsignedInteger('customer_service_id')->comment('客服id');
            $table->decimal('deposit')->default(0.00)->comment('押金');
            $table->unsignedInteger('return_reasons_id')->comment('退货原因id');
            $table->string('customer_address')->default('')->comment('客户地址');
            $table->boolean('is_scour')->default(false)->comment('是否冲款');
            $table->date('expected_arrival_time')->nullable()->comment('预计到货时间');
            $table->string('payee')->default('')->comment('收款人');
            $table->string('refund_account')->default('')->comment('退款账号');
            $table->unsignedInteger('refund_payment_methods_id')->comment('退款支付方式id(支付方式id)');
            $table->decimal('refund_amount',10, 2)->default(0.00)->comment('退款金额');
            $table->unsignedInteger('logistics_id')->default(0)->comment('物流id');
            $table->unsignedInteger('freight_types_id')->default(0)->comment('运费类型id');
            $table->decimal('freight')->default(0.00)->comment('运费');
            $table->string('logistics_sn')->default('')->comment('物流单号');
            $table->string('take_delivery_goods_address')->default('')->comment('提货地址');
            $table->string('logistics_remark')->default('')->comment('物流备注');
            $table->string('follow_up')->default('')->comment('跟进记录');
            $table->unsignedInteger('distributions_id')->default(0)->comment('配送公司');
            $table->decimal('pulling_cost',10, 2)->default(0.00)->comment('拉货费用');

            $table->unsignedInteger('person_liable_id')->default(0)->comment('责任人(用户id)');
            $table->decimal('liable_fee',10,2)->default(0.00)->comment('责任金额');
            $table->string('as_remark')->default('')->comment('售后备注');

            $table->boolean('status')->default(true)->comment('状态：0=停用，1=启用');
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
        Schema::dropIfExists('return_orders');
    }
}
