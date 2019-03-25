<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTasksErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tasks_errors', function (Blueprint $table) {
		$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('task_id');
            $table->string('subtitle_version');
            $table->integer('subtitle_position');
            $table->string('reason_code');
            $table->text('comments')->nullable();
            $table->integer('video_watched_time');
            $table->timestamps();
		$table->unique(['user_id', 'task_id', 'subtitle_version', 'subtitle_position', 'reason_code'], 'un_user_tasks_errors');
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reason_code')->references('code')->on('error_reasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tasks_errors');
    }
}
