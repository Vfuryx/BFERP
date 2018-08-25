<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockOutsTable extends Migration
{
    /**
     * Run the migrations.
     * 出库表
     * @return void
     */
    public function up()
    {
        Schema::create('stock_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('warehouse_id')->default(0)->comment('仓库id');
            $table->unsignedInteger('product_components_id')->comment("子件id");
            $table->integer('stock_out_quantity')->commetn('入库数量');
            $table->unsignedInteger('creator')->comment('创建人');
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
        Schema::dropIfExists('stock_outs');
    }
}
