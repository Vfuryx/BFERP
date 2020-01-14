<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     * 商品表
     * @return void
     */
    public function up()
    {
//        Schema::create('goods', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('commodity_code')->default('')->comment('商品编码');
//            $table->string('jd_sn')->default('')->comment('京东编码');
//            $table->string('vips_sn')->default('')->comment('唯品会编码');
//            $table->string('factory_model')->default('')->comment('工厂型号');
//            $table->string('short_name')->default('')->comment('商品简称');
//            $table->string('shops_id')->default('')->comment('店铺id');
//            $table->string('shop_nick')->default('')->comment('卖家昵称（店铺昵称）');
//            $table->unsignedInteger('supplier_id')->comment('供应商id');
//            $table->unsignedInteger('category_id')->comment('产品类别id');
//            // $table->unsignedInteger('series_id')->comment('产品系列');////暂时不开启
//            $table->string('remark')->default('')->comment('备注');
//            $table->string('title')->default('')->comment('商品标题');
//            $table->string('img')->default('')->comment('商品图片');
//            $table->string('url')->default('')->comment('商品网址');
//            $table->boolean('status')->default(true)->comment('状态：0=停用，1=启用');
//            $table->boolean('is_stop_pro')->default(false)->comment('是否停产 默认 0 = 不停产  1 = 停产');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
