<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('task_id');
            $table->string('subtitle_version');
            $table->integer('subtitle_position');
            $table->text('comments')->nullable();
            $table->integer('time_watched')->default(0);
            $table->boolean('completed')->default(false);
            $table->smallInteger('rating')->default(0);
            $table->timestamps();

            $table->unique(['user_id', 'task_id', 'subtitle_version', 'subtitle_position'], 'un_user_tasks');

            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('reason_code')->references('code')->on('error_reasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tasks');
    }
}
