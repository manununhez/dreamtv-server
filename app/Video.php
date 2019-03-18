<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $table = 'videos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'video_id',
        'primary_audio_language_code',
        'original_language',
        'title',
        'description',
        'duration',
        'thumbnail',
        'team',
        'project',
        'video_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'video_id' => 'string',
        'primary_audio_language_code' => 'string',
        'original_language' => 'string',
        'title' => 'string',
        'description' => 'string',
        'duration' => 'integer',
        'thumbnail' => 'string',
        'team' => 'string',
        'project' => 'string',
        'video_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
