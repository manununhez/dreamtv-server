<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTaskError extends Model
{
   //

	public function userTasks(){
        return $this->belongsTo(UserTask::class);
    }

}
