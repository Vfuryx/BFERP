<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogisticsAreasTable extends Migration
{
    /**
     * Run the migrations.
     * 物流区域表
     * @return void
     */
    public function up()
    {
        Schema::create('logistics_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->default('')->comment('区域代码');
            $table->string('name')->default('')->comment('区域名称');
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
        Schema::dropIfExists('logistics_areas');
    }
}
