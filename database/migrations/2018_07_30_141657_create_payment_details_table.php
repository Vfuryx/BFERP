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
            $table->decimal('payment',10,2)->default(0.00)->comment('支付金额');
            $table->string('payment_methods')->default('')->comment('支付方式');
            $table->decimal('account_amount',10,2)->default(0.00)->comment('到账金额');
            $table->unsignedBigInteger('taobao_tid')->default(0)->comment('交易号（获取淘宝的交易编号）');
            $table->unsignedBigInteger('taobao_oid')->default(0)->comment('来源单号（获取淘宝的订单号）');
            $table->string('system_order_no')->default(0)->comment('系统订单号');
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
