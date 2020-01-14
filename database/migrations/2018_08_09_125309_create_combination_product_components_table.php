<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombinationProductComponentsTable extends Migration
{
    /**
     * Run the migrations.
     * sku关联子件表
     * @return void
     */
    public function up()
    {
        Schema::create('combination_product_components', function (Blueprint $table) {
            $table->unsignedInteger('combinations_id');
            $table->unsignedInteger('product_components_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combination_product_components');
    }
}
