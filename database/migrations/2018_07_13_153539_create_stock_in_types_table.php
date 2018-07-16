<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInTypesTable extends Migration
{
    /**
     * Run the migrations.
     * 入库类型
     * @return void
     */
    public function up()
    {
        Schema::create('stock_in_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('入库类型名称');
            $table->tinyInteger('status')->default(1)->comment('状态：0=停用，1=启用');
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
        Schema::dropIfExists('stock_in_types');
    }
}
