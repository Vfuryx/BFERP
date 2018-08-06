<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     * 库存表
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('warehouse_id')->comment('仓库id');
            $table->unsignedInteger('goods_id')->comment('商品id');
            $table->unsignedInteger('pro_specs_id')->comment('产品规格id');
            $table->integer('quantity')->comment('库存数');
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
        Schema::dropIfExists('stocks');
    }
}
