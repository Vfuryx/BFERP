<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeTypesTable extends Migration
{
    /**
     * Run the migrations.
     * 费用类型表
     * @return void
     */
    public function up()
    {
        Schema::create('fee_types', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fee_category_id')->comment('费用类别id');
            $table->string('name')->default('')->comment('费用名称');
            $table->string('code')->default('')->comment('费用代码');
            $table->tinyInteger('is_default')->default(0)->comment('是否默认');
            $table->tinyInteger('status')->default(1)->comment('状态：0=停用，1=启用');
            $table->string('remark')->default('')->comment('备注');
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
        Schema::dropIfExists('fee_types');
    }
}
