<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserListTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_list_tasks', function (Blueprint $table) {
    		$table->increments('id');
    		$table->integer('user_id')->unsigned();
    		$table->string('task_id');
    		$table->string('sub_language_config');
    		$table->string('audio_language_config');
    		$table->timestamps();
    		
            $table->unique(['user_id', 'task_id'], 'un_user_list_tasks');
    		
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_list_tasks');
    }
}
