<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     * 组合表
     * @return void
     */
    public function up()
    {
        Schema::create('combinations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_specs_id')->comment('产品规格id');
            $table->unsignedInteger('com_pro_specs_id')->comment('组合产品规格id');
            $table->integer('count')->default(0)->comment('组合件数');
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
        Schema::dropIfExists('combinations');
    }
}
