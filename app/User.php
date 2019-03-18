<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //  public $fillable = [
    //     'name',
    //     'type',
    //     'token',
    //     'interface_mode',
    //     'interface_language',
    //     'sub_language',
    //     'audio_language'
    // ];

    // /**
    //  * The attributes that should be casted to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'id' => 'integer',
    //     'name' => 'string',
    //     'type' => 'string',
    //     'token' => 'string',
    //     'interface_mode' => 'string',
    //     'interface_language' => 'string',
    //     'sub_language' => 'string',
    //     'audio_language' => 'string'
    // ];

}
