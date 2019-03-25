<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVideo extends Model
{
    
    protected $primaryKey = 'pk_user_video';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['user_id','video_id', 'sub_language_config', 'audio_language_config'];  
}
