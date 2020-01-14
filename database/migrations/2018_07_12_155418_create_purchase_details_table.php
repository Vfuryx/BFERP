<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     * 采购详细 （记录组合规格里面的子规格【不记录组合规格】 和 单个规格）
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_lists_id')->comment('采购列表id');
            $table->string('purchase_item_status')->default(\App\Models\Purchase::PURCHASE_STATUS_NEW)->comment('采购子单状态:新建、部分完成、已完成');
            $table->unsignedInteger('product_components_id')->comment("产品子件id");
            $table->unsignedInteger('purchase_quantity')->comment("采购数");
            $table->unsignedInteger('stock_in_count')->default(0)->comment("已入库数");
            $table->unsignedInteger('shops_id')->default(0)->comment("采购店铺id");
            $table->unsignedInteger('suppliers_id')->default(0)->comment("供应商id");
            $table->decimal('purchase_cost',10,2)->default(0.00)->comment("采购成本");
            $table->decimal('purchase_freight',10,2)->default(0.00)->comment("采购运费");
            $table->decimal('warehouse_cost',10,2)->default(0.00)->comment("仓库成本");
            $table->decimal('commission',10,2)->default(0.00)->comment('佣金点');
            $table->decimal('discount',10,2)->default(0.00)->comment('折扣');
            $table->decimal('wooden_frame_costs',10,2)->default(0.00)->comment('木架费');
            $table->timestamp('arrival_time')->nullable()->comment('到货时间');
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
        Schema::dropIfExists('purchase_details');
    }
}
