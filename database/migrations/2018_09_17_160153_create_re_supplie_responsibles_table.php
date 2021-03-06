<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReSupplieResponsiblesTable extends Migration
{
    /**
     * Run the migrations.
     * 补件责任方表
     * @return void
     */
    public function up()
    {
        Schema::create('re_supplie_responsibles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('补件责任方名称');
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
        Schema::dropIfExists('re_supplie_responsibles');
    }
}
