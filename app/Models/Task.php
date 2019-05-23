<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'task_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

	// If your primary key is not an integer, you should set the protected $keyType property on your model to string.
    protected $keyType = 'string';

    protected $fillable = [
    	'task_id', 'video_id','language', 'type', 'created', 'completed', 'modified'
    ];  


    public function videos(){
        return $this->belongsTo(Video::class, 'video_id')->orderBy('created_at','desc');
    }
}
