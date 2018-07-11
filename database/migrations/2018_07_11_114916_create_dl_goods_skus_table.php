<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDlGoodsSkusTable extends Migration
{
    /**
     * Run the migrations.
     * 下载商品的sku表
     * @return void
     */
    public function up()
    {
        Schema::create('dl_goods_skus', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('goods_downloads_id')->comment('下载商品ID');
            $table->unsignedBigInteger('sku_id')->comment('sku的id');
            $table->unsignedBigInteger('num_iid')->comment('	商品数字id');
            $table->string('properties')->comment('sku的销售属性组合字符串（颜色，大小，等等，可通过类目API获取某类目下的销售属性）,格式是p1:v1;p2:v2');
            $table->string('properties_name')->comment('ku所对应的销售属性的中文名字串，格式如pid1:vid1:pid_name1:vid_name1;pid2:vid2:pid_name2:vid_name2……');
            $table->integer('quantity')->comment('属于这个sku的商品的数量');
            $table->decimal('price',10,2)->comment('属于这个sku的商品的价格 取值范围:0-100000000;精确到2位小数;单位:元。如:200.07，表示:200元7分。');
            $table->integer('sku_spec_id')->comment('表示SKu上的产品规格信息');
            $table->string('outer_id')->comment('商家设置的外部id。天猫和集市的卖家，需要登录才能获取到自己的商家编码，不能获取到他人的商家编码。');
            $table->dateTime('created')->commet('sku创建日期 时间格式：yyyy-MM-dd HH:mm:ss');
            $table->dateTime('modified')->commet('sku最后修改日期 时间格式：yyyy-MM-dd HH:mm:ss');
            $table->string('status')->comment('sku状态。 normal:正常 ；delete:删除');
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
        Schema::dropIfExists('dl_goods_skus');
    }
}
