<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserListTask extends Model
{

   protected $fillable = ['user_id','task_id', 'sub_language', 'audio_language']; 


   public function users(){
        return $this->belongsTo(User::class, 'user_id');
   } 

   public function tasks(){
        return $this->belongsTo(Task::class, 'task_id');
    }
}
