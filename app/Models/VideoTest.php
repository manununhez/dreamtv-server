<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTest extends Model
{
    
   protected $fillable= [
		'video_id', 'subtitle_version', 'language_code'
	];

}
