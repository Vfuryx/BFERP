<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('refund_sn')->comment('退款单号');
            $table->unsignedInteger('orders_sn')->comment('系统单号');
            $table->string('order_source')->comment('订单来源');
            $table->unsignedInteger('payment_methods_id')->comment('支付方式id');
            $table->dateTime('time_out_at')->nullable()->comment('超时时间');
            $table->unsignedInteger('shops_id')->comment('店铺id');
            $table->string('account')->default('')->comment('还款账号');
            $table->unsignedInteger('refund_payment_methods_id')->comment('还款支付方式id');
            $table->string('bank')->default('')->comment('开户银行');
            $table->string('address')->default('')->comment('开户地址');
            $table->decimal('refund_amount',10, 2)->default(0.00)->comment('退款金额');
            $table->string('transaction_sn')->default('')->comment('交易单号');
            $table->unsignedInteger('return_reasons_id')->comment('退款原因id');
            $table->string('seller_nick')->default('')->comment('卖家昵称');
            $table->string('seller_name')->default('')->comment('卖家名称');
            $table->decimal('payment', 10, 2)->default(0.00)->comment('支付金额');
            $table->string('person_liable')->default('')->comment('负责人');
            $table->string('refund_instructions')->default('')->comment('退款说明');
            $table->string('business_remark')->default('')->comment('业务备注');
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
        Schema::dropIfExists('refund_orders');
    }
}
