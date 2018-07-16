<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInDetailsTable extends Migration
{
    /**
     * Run the migrations.
     * 入库详情
     * @return void
     */
    public function up()
    {
        Schema::create('stock_in_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stock_ins_id')->default(0)->comment('入库单id');
            $table->unsignedInteger('purchases_id')->default(0)->comment('采购单id');
            $table->unsignedInteger('product_specs_id')->comment("产品规格id");
            $table->integer('stock_in_quantity')->commetn('入库数量');
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
        Schema::dropIfExists('stock_in_details');
    }
}
