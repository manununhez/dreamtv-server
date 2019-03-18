<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Video
 * @package App\Models
 * @version September 26, 2017, 8:21 am UTC
 *
 * @property string video_id
 * @property string primary_audio_language_code
 * @property string original_language
 * @property string title
 * @property string description
 * @property integer duration
 * @property string thumbnail
 * @property string team
 * @property string project
 * @property string video_url
 */
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
