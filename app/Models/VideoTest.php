<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTest extends Model
{
    


    /**
     * Get the video record associated with the video test.
     */
    public function video()
    {
        return $this->hasOne(Video::class);
    }
}
