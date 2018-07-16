<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseReturnsTable extends Migration
{
    /**
     * Run the migrations.
     * 采购退货表
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('purchase_return_no')->comment('采购退货单号');
            $table->string('creator')->comment('创建人');
            $table->string('submitter')->default('')->comment('提交人');
            $table->dateTime('submit_at')->default('')->comment('提交时间');
            $table->string('checker')->default('')->comment('审核人');
            $table->dateTime('check_at')->default('')->comment('审核时间');
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
        Schema::dropIfExists('purchase_returns');
    }
}
