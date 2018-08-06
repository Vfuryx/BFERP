<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancelPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     * 取消采购表
     * @return void
     */
    public function up()
    {
        Schema::create('cancel_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cancel_purchases_no')->comment('取消采购单号');
            $table->unsignedInteger('purchases_id')->comment('采购单id');
            $table->string('creator')->comment('创建人');
            $table->string('submitter')->default('')->comment('提交人');
            $table->timestamp('submit_at')->nullable()->comment('提交时间');
            $table->boolean('is_submit')->default(false)->comment('是否提交');
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
        Schema::dropIfExists('cancel_purchases');
    }
}
