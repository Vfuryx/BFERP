<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     * 支付明细
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('orders_id')->comment('订单id');
            $table->decimal('payment',10,2)->default(0.00)->comment('支付金额');
            $table->unsignedBigInteger('taobao_tid')->default(0)->comment('交易号（获取淘宝的交易编号）');
            $table->unsignedBigInteger('taobao_oid')->default(0)->comment('子订单编号（获取淘宝的子订订单号）');
            $table->timestamp('pay_time')->nullable()->comment('付款时间');
            $table->string('remark')->default('')->comment('备注');
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
        Schema::dropIfExists('payment_details');
    }
}
