<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersReportsTable extends Migration
{
    /**
     * Run the migrations.
     * 供应商汇总信息表
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stock_id')->comment('库存id');
            $table->unsignedInteger('supplier_id')->comment('供应商id');
            $table->integer('purchase_quantity')->comment('采购数');
            $table->integer('warehousing_quantity')->comment('入库数');
            $table->integer('consignor')->comment('代发数');
            $table->dateTime('delivery_time')->comment('到货时间');
            $table->integer('fifo')->comment('先进先出发货数');
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
        Schema::dropIfExists('suppliers_reports');
    }
}
