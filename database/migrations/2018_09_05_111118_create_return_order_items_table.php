<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     * 退货子单
     * @return void
     */
    public function up()
    {
        Schema::create('return_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('return_orders_id')->comment('退货订单id');
            $table->unsignedInteger('order_items_id')->comment('子订单id');
            $table->unsignedInteger('suppliers_id')->comment('供应商id');
            $table->boolean('is_damage')->default(false)->comment('是否损坏');
            $table->unsignedInteger('receipt_types_id')->default(0)->comment('收货类型id');
            $table->decimal('repair_price',10,2)->default(0.00)->comment('返修价格');
            $table->date('factory_return_time')->nullable()->comment('退厂时间');
            $table->date('expected_return_time')->nullable()->comment('预计返还时间');
            $table->unsignedInteger('warehouse_id')->default(0)->comment('收货仓库');
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
        Schema::dropIfExists('return_order_items');
    }
}
