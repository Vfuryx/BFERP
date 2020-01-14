<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockDelLogsTable extends Migration
{
    /**
     * Run the migrations.
     *  库存删除记录表
     * @return void
     */
    public function up()
    {
        Schema::create('stock_del_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stock_id')->comment('库存id');
            $table->unsignedInteger('user_id')->comment('用户id');
            $table->string('commodity_code')->comment('商品编码');
            $table->string('specs_code')->comment('规格编码');
            $table->string('warehouse_name')->comment('所属仓库');
            $table->integer('stock_quantity')->comment('库存数');
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
        Schema::dropIfExists('stock_del_logs');
    }
}
