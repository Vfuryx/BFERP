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
            $table->unsignedInteger('purchase_details_id')->default(0)->comment('采购详情id');
            $table->unsignedInteger('product_components_id')->comment("子件id");
            $table->decimal('total_fee',10,2)->comment('总额');
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
