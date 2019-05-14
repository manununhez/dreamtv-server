<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTaskErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_task_errors', function (Blueprint $table) {
            $table->integer('user_tasks_id')->unsigned();
            $table->string('reason_code');
            $table->integer('subtitle_position');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->unique(['user_tasks_id', 'reason_code', 'subtitle_position'], 'un_user_task_errors');

            $table->foreign('user_tasks_id')->references('id')->on('user_tasks')->onDelete('cascade');
            $table->foreign('reason_code')->references('reason_code')->on('error_reasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_task_errors');
    }
}
