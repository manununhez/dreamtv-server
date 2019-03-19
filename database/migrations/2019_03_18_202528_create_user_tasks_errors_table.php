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
            $table->primary(['user_id','task_id','subtitle_version','subtitle_position','reason_code'], 'pk_user_tasks_errors');
            $table->integer('user_id');
            $table->integer('task_id');
            $table->string('subtitle_version');
            $table->integer('subtitle_position');
            $table->string('reason_code');
            $table->text('comments')->nullable();
            $table->integer('video_watched_time');
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
        Schema::dropIfExists('user_tasks_errors');
    }
}
