<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInsTable extends Migration
{
    /**
     * Run the migrations.
     * 入库表
     * @return void
     */
    public function up()
    {
        Schema::create('stock_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_in_no')->comment('入库单号');
            $table->unsignedInteger('warehouse_id')->default(0)->comment('仓库id');
            $table->unsignedInteger('stock_in_types_id')->default(0)->comment('入库类型id');
            $table->string('creator')->comment('创建人');
            $table->string('submitter')->default('')->comment('提交人');
            $table->timestamp('submit_at')->nullable()->comment('提交时间');
            $table->string('checker')->default('')->comment('审核人');
            $table->timestamp('check_at')->nullable()->comment('审核时间');
            $table->string('warehouer')->default('')->comment('入库人');
            $table->timestamp('stock_in_at')->nullable()->comment('入库时间');
            $table->tinyInteger('is_submit')->default(0)->comment('是否提交');
            $table->tinyInteger('is_check')->default(0)->comment('是否审核');
            $table->tinyInteger('is_stock_in')->default(0)->comment('是否入库');
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
        Schema::dropIfExists('stock_ins');
    }
}
