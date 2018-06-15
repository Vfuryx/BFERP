<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::beginTransaction();

        Schema::create('role_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->unique()->comment('分组名');
            $table->string('description')->default('')->comment('分组描述');
            $table->tinyInteger('status')->default(1)->comment('状态：0=停用，1=启用');
            $table->string('remark')->default('')->comment('备注');
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_group_id')->nullable()->comment('分组ID');
            $table->foreign('role_group_id')->references('id')->on('role_groups')
                ->onUpdate('cascade')->onDelete('set null');
            $table->string('name')->default('')->comment('角色名');
            $table->string('description')->default('')->comment('角色描述');
            $table->tinyInteger('status')->default(1)->comment('状态：0=停用，1=启用');
            $table->string('remark')->default('')->comment('备注');
            $table->timestamps();
        });
        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('权限名称');
            $table->unsignedInteger('type')->comment("权限类别：0 = 菜单，1 = 按钮");
            $table->string('description')->nullable()->comment('权限描述');
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

        \Illuminate\Support\Facades\DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_groups');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('permission_role');
    }
}
