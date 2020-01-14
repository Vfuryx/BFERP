<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     * 店铺表
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nick')->default('')->comment('卖家昵称');
            $table->string('title')->default('')->comment('店铺标题');
            $table->string('session_key')->default('')->comment('SessionKey');
            $table->unsignedInteger('warehouse_id')->comment('默认仓库');
            $table->string('shop_account')->default('')->comment('店铺账号');
            $table->string('shop_passwd')->default('')->comment('店铺密码');
            $table->decimal('rebate',10,2)->default(0.00)->comment('返点（%）');
            $table->string('principal')->default('')->comment('店铺负责人');
            $table->string('principal_mobile')->default('')->comment('负责人电话');
            $table->string('province')->default('')->comment('发货地（省）');
            $table->string('city')->default('')->comment('发货地（市）');
            $table->string('district')->default('')->comment('发货地（区）');
            $table->string('address')->default('')->comment('发货地（地址）');
            $table->decimal('gross_profit_rate',10,2)->default(0.00)->comment('毛利率（%）');
            $table->integer('platform_id')->default(0)->comment('平台类型');
            $table->boolean('is_waybill')->default(true)->comment('电子面单');
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
        Schema::dropIfExists('shops');
    }
}
