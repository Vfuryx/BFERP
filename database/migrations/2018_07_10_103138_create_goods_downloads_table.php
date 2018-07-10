<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     * 商品下载表
     * @return void
     */
    public function up()
    {
        Schema::create('goods_downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('产品名称');
            $table->string('binds')->comment('产品的非关键属性列表.格式:pid:vid;pid:vid.');
            $table->string('sale_props')->comment('产品的销售属性列表.格式:pid:vid;pid:vid');
            $table->string('Price')->comment('产品的市场价.单位为元.精确到2位小数;如:200.07');
            $table->string('desc')->comment('产品的描述.最大25000个字节');
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
        Schema::dropIfExists('goods_downloads');
    }
}
