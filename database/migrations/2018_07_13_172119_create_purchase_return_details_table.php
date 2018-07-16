<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseReturnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     * 采购退货详情表
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_return_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_specs_id')->comment("产品规格id");
            $table->integer('purchase_return_quantity')->comment("采购退货数");
            $table->unsignedInteger('suppliers_id')->comment('供应商id');
            $table->decimal('price_differences',10,2)->comment('差价');
            $table->unsignedInteger('purchase_return_types_id')->comment('采购退货类型id');
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
        Schema::dropIfExists('purchase_return_details');
    }
}
