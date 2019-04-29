<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
   //
	protected $fillable = [
		'task_id', 'user_id', 'subtitle_version', 'subtitle_position', 'comments', 'time_watched', 'completed', 'rating'
	];
	public function users(){
	    return $this->belongsTo(User::class, 'user_id');
	} 

   	public function tasks(){
        return $this->belongsTo(Task::class, 'task_id');
    }


    public function userTaskErrors(){
    	return $this->hasMany(UserTaskError::class, 'user_tasks_id', 'id');
    }
}
