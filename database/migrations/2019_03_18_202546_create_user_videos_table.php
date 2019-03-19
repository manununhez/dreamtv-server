<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_videos', function (Blueprint $table) {
            $table->primary(['user_id', 'video_id']);
            $table->integer('user_id')->unsigned();
            $table->string('video_id');
            $table->foreign('video_id')->references('video_id')->on('videos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('sub_language_config');
            $table->string('audio_language_config');
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
        Schema::dropIfExists('user_videos');
    }
}
