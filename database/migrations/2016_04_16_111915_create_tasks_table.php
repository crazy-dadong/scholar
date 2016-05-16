<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('module_id');
            $table->bigInteger('user_id');
            $table->string('name');
            $table->text('description')->default('');
            $table->timestamp('plan_started_at');
            $table->timestamp('plan_end_at');
            $table->integer('priority')->unsigned()->default(4);    //优先级 1 2 3 4
            $table->timestamp('actually_started_at');   //实际开始时间
            $table->timestamp('actually_end_at');       //实际结束事件
            $table->integer('status')->unsigned()->default(0);      //0 未执行 1 执行中 2 完成 3未完成 4 修改
            $table->softDeletes();
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
        Schema::drop('tasks');
    }
}
