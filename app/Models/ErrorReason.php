<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorReason extends Model
{
    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'reason_code'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

	// If your primary key is not an integer, you should set the protected $keyType property on your model to string.
    protected $keyType = 'string';

    protected $fillable = ['reason_code','name', 'description', 'language']; 


    public function userTasksError(){
        return $this->hasMany(UserTaskError::class, 'reason_code');
    } 
}
