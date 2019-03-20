<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('video_id');
            $table->foreign('video_id')->references('video_id')->on('videos')->onDelete('cascade');
            $table->integer("subtitle_version");
            $table->string("language_code");    
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
        Schema::dropIfExists('video_tests');
    }
}
