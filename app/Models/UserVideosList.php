<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UserVideosList
 * @package App\Models
 * @version September 26, 2017, 8:20 am UTC
 *
 * @property integer user_id
 * @property string video_id
 * @property string primary_audio_language_code
 * @property string original_language
 */
class UserVideosList extends Model
{

    public $table = 'user_videos_lists';
    
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
