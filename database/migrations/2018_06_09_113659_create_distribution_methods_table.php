<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionMethodsTable extends Migration
{
    /**
     * Run the migrations.
     * 配送方式表
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('配送方式名称');
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
        Schema::dropIfExists('distribution_methods');
    }
}
