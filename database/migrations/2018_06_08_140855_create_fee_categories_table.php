<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     * 费用类别表
     * @return void
     */
    public function up()
    {
        Schema::create('fee_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('费用类别名称');
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
        Schema::dropIfExists('fee_categories');
    }
}
