<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

	// Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'video_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

	// If your primary key is not an integer, you should set the protected $keyType property on your model to string.
    protected $keyType = 'string';

    protected $fillable = ['video_id','primary_audio_language_code', 'original_language', 'title', 'description', 'duration', 'thumbnail', 'team', 'project', 'video_url'];  

    public function userVideos(){
        return $this->hasMany(UserVideo::class);
    }

    public function tasks(){
    	return $this->hasMany(Task::class);
    }


}
