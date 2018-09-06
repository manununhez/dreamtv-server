<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Reason
 * @package App\Models
 * @version September 26, 2017, 8:15 am UTC
 *
 * @property string code
 * @property string name
 * @property string description
 * @property string language
 */
class Reason extends Model
{

    public $table = 'reasons';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'code',
        'name',
        'description',
        'language'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'description' => 'string',
        'language' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
