<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     * 组合sku表
     * @return void
     */
    public function up()
    {
        Schema::create('combinations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pid')->comment('产品id');
            $table->string('name')->comment('组合名称');
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
