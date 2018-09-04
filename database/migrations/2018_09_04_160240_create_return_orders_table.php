<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('return_sn')->comment('退货单号');
            $table->string('order_sn')->comment('系统单号');
            $table->unsignedInteger('return_order_status')->comment('订单状态');
            $table->unsignedInteger('shops')->comment('店铺');
            $table->string('member_nick')->comment('会员昵称');
            $table->string('customer_name')->comment('客户姓名');
            $table->string('customer_phone')->comment('客户电话');
            $table->unsignedInteger('customer_service_id')->comment('客服id');
            $table->decimal('deposit')->comment('押金');
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
