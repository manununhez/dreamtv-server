<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ErrorReasons
 * @package App\Models
 * @version September 26, 2017, 8:15 am UTC
 *
 * @property string code
 * @property string name
 * @property string description
 * @property string language
 */
class ErrorReasons extends Model
{
    public $table = 'error_reasons';
    
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
