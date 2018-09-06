<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UserTask
 * @package App\Models
 * @version September 26, 2017, 8:20 am UTC
 *
 * @property integer user_id
 * @property integer task_id
 * @property string subtitle_version
 * @property integer subtitle_position
 * @property string reason_id
 * @property string comments
 */
class UserTask extends Model
{

    public $table = 'userTasks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'user_id',
        'task_id',
        'subtitle_version',
        'subtitle_position',
        'reason_id',
        'comments'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'task_id' => 'integer',
        'subtitle_version' => 'string',
        'subtitle_position' => 'integer',
        'reason_id' => 'string',
        'comments' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
