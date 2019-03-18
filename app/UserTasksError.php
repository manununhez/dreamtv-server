<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTasksError extends Model
{
    public $table = 'user_tasks_errors';
    
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
