<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     * 采购表
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('purchase_order_no')->comment('采购单号');
            $table->string('purchase_status')->default("新建")->comment('采购状态');
            $table->string('receiver')->comment('收货人');
            $table->string('receiver_address')->comment('收货地址');
            $table->string('remark')->default('')->comment('备注');
            $table->unsignedInteger('warehouse_id')->default(0)->comment('仓库id');
            $table->string('order_no')->comment('订单编号');
            $table->unsignedInteger('user_id')->comment('用户id');
            $table->dateTime('print_at')->comment('打印时间');
            $table->dateTime('check_at')->comment('审核时间');
            $table->dateTime('promise_delivery_time')->comment('承诺发货时间');
            $table->string('salesman')->comment('业务员');
            $table->string('source')->comment('采购单来源');
            $table->string('client_name')->comment('客户名');
            $table->string('buyer_nick')->comment('卖家昵称');
            $table->tinyInteger('is_submit')->default(1)->comment('是否提交');
            $table->tinyInteger('is_print')->comment('是否打印');
            $table->tinyInteger('is_check')->comment('是否审核');
            $table->tinyInteger('is_change')->comment('是否审核');
            $table->tinyInteger('status')->default(1)->comment('状态：0=停用，1=启用');
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
        Schema::dropIfExists('purchases');
    }
}
