<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserListTask extends Model
{

   protected $fillable = ['user_id','task_id', 'sub_language_config', 'audio_language_config']; 


   public function users(){
        return $this->belongsTo(User::class, 'user_id');
   } 

   public function tasks(){
        return $this->belongsTo(Task::class, 'task_id');
    }
}
