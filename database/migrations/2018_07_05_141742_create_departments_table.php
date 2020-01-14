<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     * 部门表
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dept_no')->comment('部门代码');
            $table->string('name')->comment('部门名称');
            $table->unsignedInteger('p_dept')->default(0)->comment('所属主部门');
            $table->string('remark')->default('')->comment('备注');
            $table->boolean('is_verify')->default(false)->comment('是否验证');
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
        Schema::dropIfExists('departments');
    }
}
