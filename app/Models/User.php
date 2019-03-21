<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
  
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'interface_mode', 'interface_language', 'sub_language', 'audio_language'
    ];
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function products(){
        return $this->hasMany(Product::class);
    }

    public function userVideos(){
        return $this->hasMany(UserVideo::class);
    }

    public function userTasksErrors(){
        return $this->hasManu(userTasksError::class);
    }
}
