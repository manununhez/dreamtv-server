<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Task
 * @package App\Models
 * @version September 26, 2017, 8:19 am UTC
 *
 * @property integer task_id
 * @property string video_id
 * @property string language
 * @property string type
 * @property integer priority
 * @property string created
 * @property string modified
 * @property string completed
 */
class Task extends Model
{
    public $table = 'tasks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'task_id',
        'video_id',
        'language',
        'type',
        'priority',
        'created',
        'modified',
        'completed'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'task_id' => 'integer',
        'video_id' => 'string',
        'language' => 'string',
        'type' => 'string',
        'priority' => 'integer',
        'created' => 'string',
        'modified' => 'string',
        'completed' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

}
