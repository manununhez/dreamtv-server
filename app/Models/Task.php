<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    protected $table = 'tasks';
	// Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'task_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;


    protected $fillable = [
    	'task_id', 'video_id', 'video_title', 'video_description','language', 'type', 'created', 'completed', 'modified'
    ];  


    public function videos(){
        return $this->belongsTo(Video::class, 'video_id')->orderBy('created_at','desc');
    }

    public function videosByDuration($minDuration, $maxDuration){
        if($minDuration == null && $maxDuration == null)
            return $this->belongsTo(Video::class, 'video_id')->orderBy('created_at','desc');
        else if($maxDuration == null)
            return $this->belongsTo(Video::class, 'video_id')->where('duration', '>', $minDuration)->orderBy('created_at','desc');
        else if($minDuration == null)
            return $this->belongsTo(Video::class, 'video_id')->where('duration', '<', $maxDuration)->orderBy('created_at','desc');
        else
            return $this->belongsTo(Video::class, 'video_id')->where('duration', '>', $minDuration)->where('duration', '<', $maxDuration)->orderBy('created_at','desc');
    }

	public function userTasks(){
        $id = Auth::id();
		return $this->hasMany(UserTask::class, 'task_id', 'task_id')->where('user_id', $id);
	}
}
