<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogisticsTable extends Migration
{
    /**
     * Run the migrations.
     * 物流表
     * @return void
     */
    public function up()
    {
        Schema::create('logistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->default('')->comment('物流代码');
            $table->string('name')->default('')->comment('物流名称');
            $table->unsignedInteger('report_id')->comment('报表格式id');
//            $table->unsignedInteger('logistics_area_id')->default(0)->comment('物流区域id');
            $table->tinyInteger('expected_days')->default(0)->comment('预计天数');
            $table->string('phone')->default('')->comment('物流电话');
            $table->string('address')->default('')->comment('物流地址');
            $table->unsignedInteger('freight_type_id')->comment('运费类型id');
            $table->string('remark')->default('')->comment('备注');
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
        Schema::dropIfExists('logistics');
    }
}
