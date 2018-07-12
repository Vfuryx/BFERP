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
            $table->increments('goods_downloads_id')->comment('下载商品ID');
            $table->unsignedInteger('shops_id')->comment('店铺id');
            $table->string('dl_type')->comment('下载类型 seller在售商品，inventory库存商品');
            $table->unsignedBigInteger('num_iid')->comment('商品数字id');
            $table->unsignedBigInteger('cid')->comment('商品所属的叶子类目 id');
            $table->string('seller_cids')->comment('商品所属的店铺内卖家自定义类目列表');
            $table->string('props')->comment('商品属性 格式：pid:vid;pid:vid');
            $table->string('title')->comment('商品标题,不能超过60字节');
            $table->decimal('price',10,2)->comment('商品价格，格式：5.00；单位：元；精确到：分');
            $table->integer('num')->comment('商品数量');
            $table->string('nick')->comment('卖家昵称');
            $table->string('pic_url')->comment('商品主图片地址');
            $table->string('approve_status')->comment('商品上传后的状态。onsale出售中，instock库中');
            $table->integer('valid_thru')->comment('7 有效期,7或者14（默认是7天）');
            $table->string('type')->comment('商品类型(fixed:一口价;auction:拍卖)注：取消团购');
            $table->dateTime('list_time')->commet('上架时间（格式：yyyy-MM-dd HH:mm:ss）');
            $table->dateTime('delist_time')->commet('下架时间（格式：yyyy-MM-dd HH:mm:ss）');
            $table->dateTime('modified ')->commet('商品修改时间（格式：yyyy-MM-dd HH:mm:ss）');
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
