<?php

use Illuminate\Support\Facades\Schema;
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
            $table->integer('task_id')->primary();
            $table->string('video_id');
            $table->string('video_title');
            $table->string('video_description');
            $table->string('language');
            $table->string('type');
            $table->string('created');
            $table->string('modified');
            $table->string('completed')->nullable();
            $table->timestamps();

            $table->foreign('video_id')->references('video_id')->on('videos')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
