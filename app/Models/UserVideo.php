<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVideo extends Model
{

   protected $fillable = ['user_id','video_id', 'sub_language_config', 'audio_language_config'];  
}
