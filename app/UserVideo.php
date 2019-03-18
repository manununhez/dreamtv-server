<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVideo extends Model
{
     public $table = 'user_videos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'user_id',
        'video_id',
        'primary_audio_language_code',
        'original_language'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'video_id' => 'string',
        'primary_audio_language_code' => 'string',
        'original_language' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
