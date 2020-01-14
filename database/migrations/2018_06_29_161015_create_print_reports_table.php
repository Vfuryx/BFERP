<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintReportsTable extends Migration
{
    /**
     * Run the migrations.
     * 打印报表
     * @return void
     */
    public function up()
    {
        Schema::create('print_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file')->default('')->comment('报表文件');
            $table->string('name')->default('')->comment('报表名称');
            $table->string('paper_format')->default('')->comment('报表格式');
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
        Schema::dropIfExists('print_reports');
    }
}
