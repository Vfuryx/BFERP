<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundReasonsTable extends Migration
{
    /**
     * Run the migrations.
     * 退款原因
     * @return void
     */
    public function up()
    {
        Schema::create('refund_reasons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('退款原因名称');
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
        Schema::dropIfExists('refund_reasons');
    }
}
