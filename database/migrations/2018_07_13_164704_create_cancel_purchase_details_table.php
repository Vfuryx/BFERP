<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancelPurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     * 取消采购单详情表
     * @return void
     */
    public function up()
    {
        Schema::create('cancel_purchase_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cancel_purchases_id')->comment('取消采购id');
            $table->unsignedInteger('purchase_details_id')->comment("采购详细id");
            $table->integer('cancel_purchase_quantity')->comment("取消采购数");
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
        Schema::dropIfExists('cancel_purchase_details');
    }
}
