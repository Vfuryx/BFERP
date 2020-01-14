<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionTypesTable extends Migration
{
    /**
     * Run the migrations.
     * 配送类型表
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('配送类型名称');
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
        Schema::dropIfExists('distribution_types');
    }
}
