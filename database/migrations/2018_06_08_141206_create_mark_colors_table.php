<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkColorsTable extends Migration
{
    /**
     * Run the migrations.
     * 标记颜色表
     * @return void
     */
    public function up()
    {
        Schema::create('mark_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('markcode')->default('')->comment('标记代码');
            $table->string('markname')->default('')->comment('标记名称');
            $table->string('color')->default('')->comment('颜色');
            $table->string('description')->default('')->comment('描述');
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
        Schema::dropIfExists('mark_colors');
    }
}
