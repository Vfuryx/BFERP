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
            $table->unsignedInteger('freight_types_id')->comment('运费类型id');
            $table->unsignedInteger('distribution_methods_id')->comment('配送方式');

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
