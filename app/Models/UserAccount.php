<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UserAccount
 * @package App\Models
 * @version September 26, 2017, 8:19 am UTC
 *
 * @property string name
 * @property string type
 * @property string token
 * @property string interface_mode
 * @property string interface_language
 * @property string sub_language
 * @property string audio_language
 */
class UserAccount extends Model
{

    public $table = 'user_accounts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'type',
        'token',
        'interface_mode',
        'interface_language',
        'sub_language',
        'audio_language'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'string',
        'token' => 'string',
        'interface_mode' => 'string',
        'interface_language' => 'string',
        'sub_language' => 'string',
        'audio_language' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
