<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSpecsTable extends Migration
{
    /**
     * Run the migrations.
     * 产品规格
     * @return void
     */
    public function up()
    {
        Schema::create('product_specs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id')->comment('产品id');
            $table->string('spec_code')->default('')->comment('规格编码');
            $table->string('jd_specs_code')->default('')->comment('京东规格编码');
            $table->string('vips_specs_code')->default('')->comment('唯品会规格编码');
            $table->decimal('tb_price',10,2)->default(0.00)->comment('淘宝价格');
            $table->decimal('cost',10,2)->default(0.00)->comment('成本价格');
            $table->decimal('price',10,2)->default(0.00)->comment('售价');
            $table->decimal('highest_price',10,2)->default(0.00)->comment('最高售价');
            $table->decimal('lowest_price',10,2)->default(0.00)->comment('最低售价');
            $table->decimal('warehouse_cost',10,2)->default(0.00)->comment('仓库成本');
            $table->decimal('assembly_price',10,2)->default(0.00)->comment('装配价格');
            $table->decimal('discount',10,2)->default(0.00)->comment('折扣');
            $table->decimal('commission',10,2)->default(0.00)->comment('佣金点');
            $table->boolean('is_combination')->default(false)->comment('是否组合');
            $table->integer('package_quantity')->default(0)->comment('包件数量');
            $table->decimal('package_costs',10,2)->default(0.00)->comment('打包费用');
            $table->decimal('wooden_frame_costs',10,2)->default(0.00)->comment('木架费');
            $table->decimal('purchase_freight',10,2)->default(0.00)->comment('采购运费');
            $table->integer('inventory_warning')->default(0)->comment('库存预警(数量)');
            $table->integer('purchase_days_warning')->default(0)->comment('采购预警天数');
            $table->integer('available_warning')->default(0)->comment('可售数预警');
            $table->tinyInteger('distribution_method_id')->comment('配送类别');
            $table->string('bar_code')->default('')->comment('条形码');
            $table->string('img_url')->default('')->comment('图片地址');
            $table->string('spec')->default('')->comment('规格');
            $table->string('color')->default('')->comment('颜色');
            $table->string('materials')->default('')->comment('材质');
            $table->string('function')->default('')->comment('功能');
            $table->string('special')->default('')->comment('特殊');
            $table->string('other')->default('')->comment('其他');
            $table->double('longness',10,2)->default(0.00)->comment('长度（mm）');
            $table->double('width',10,2)->default(0.00)->comment('宽度（mm）');
            $table->double('height',10,2)->default(0.00)->comment('高度（mm）');
            $table->double('volume',10,2)->default(0.00)->comment('体积(m²)');
            $table->double('weight',10,2)->default(0.00)->comment('重量');
            $table->string('remark')->default('')->comment('备注');
            $table->boolean('finished_pro')->default(false)->comment('是否成品 0=不是 1=是');
            $table->boolean('is_stop_pro')->default(false)->comment('是否停产 0 不是 1 是');
            // $table->boolean('status')->default(true)->comment('状态：0=停用，1=启用');
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
        Schema::dropIfExists('product_specs');
    }
}
