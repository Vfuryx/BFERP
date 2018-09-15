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
            $table->string('external_sn')->default('')->comment('外部单号');
            $table->unsignedInteger('warehouse_id')->default(0)->comment('仓库id');
            $table->unsignedInteger('stock_in_types_id')->default(0)->comment('入库类型id');
            $table->unsignedInteger('suppliers_id')->default(0)->comment('供应商id');
            $table->unsignedInteger('creator')->comment('创建人');
            $table->boolean('is_submit')->default(false)->comment('是否提交');
            $table->unsignedInteger('submitter')->default(0)->comment('提交人');
            $table->timestamp('submit_at')->nullable()->comment('提交时间');
            $table->boolean('is_print')->default(false)->comment('是否打印');
            $table->timestamp('print_at')->nullable()->comment('打印时间');
            $table->boolean('is_audit')->default(false)->comment('是否审核');
            $table->unsignedInteger('auditor')->default(0)->comment('审核人');
            $table->timestamp('audit_at')->nullable()->comment('审核时间');
            $table->boolean('is_stock_in')->default(false)->comment('是否入库');
            $table->unsignedInteger('warehouer')->default(0)->comment('入库人');
            $table->timestamp('stock_in_at')->nullable()->comment('入库时间');
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
        Schema::dropIfExists('stock_ins');
    }
}
