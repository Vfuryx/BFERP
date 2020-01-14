<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReSupplieCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     * 补件类别表
     * @return void
     */
    public function up()
    {
        Schema::create('re_supplie_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('补件类别名称');
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
        Schema::dropIfExists('re_supplie_categories');
    }
}
