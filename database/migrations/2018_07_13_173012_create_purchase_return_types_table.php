<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseReturnTypesTable extends Migration
{
    /**
     * Run the migrations.
     * 采购退货类型表
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_return_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('采购退货类型名称');
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
        Schema::dropIfExists('purchase_return_types');
    }
}
