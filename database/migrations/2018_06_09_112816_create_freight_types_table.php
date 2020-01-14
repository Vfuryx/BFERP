<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightTypesTable extends Migration
{
    /**
     * Run the migrations.
     * 运费类型表
     * @return void
     */
    public function up()
    {
        Schema::create('freight_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('运费名称');
            $table->boolean('status')->default(true)->comment('状态：0=停用，1=启用');
            $table->boolean('is_default')->default(true)->comment('是否默认');
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
        Schema::dropIfExists('freight_types');
    }
}
