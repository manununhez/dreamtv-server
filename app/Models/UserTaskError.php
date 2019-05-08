<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTaskError extends Model
{
   protected $fillable = ['user_tasks_id','reason_code']; 

	public function userTasks(){
        return $this->belongsTo(UserTask::class);
    }

}
