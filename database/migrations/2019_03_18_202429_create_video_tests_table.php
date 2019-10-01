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
            $table->integer("sub_version");
            $table->string("sub_language");    
            $table->timestamps();

           // $table->foreign('video_id')->references('video_id')->on('videos')->onDelete('cascade');
            
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
