<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
   //

	public function users(){
	    return $this->belongsTo(User::class, 'user_id');
	} 

   	public function tasks(){
        return $this->belongsTo(Task::class, 'task_id');
    }


    public function userTaskErrors(){
    	return $this->hasMany(UserTaskError::class);
    }
}
