<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTest extends Model
{
    
   protected $fillable= [
		'video_id', 'sub_version', 'sub_language'
	];

}
