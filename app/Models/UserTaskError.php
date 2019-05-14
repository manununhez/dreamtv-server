<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTaskError extends Model
{
		/**
	 * primaryKey 
	 * 
	 * @var integer
	 * @access protected
	 */
	protected $primaryKey = null;

	/**
	 * Indicates if the IDs are auto-incrementing.
	 *
	 * @var bool
	 */
	public $incrementing = false;

   	protected $fillable = ['user_tasks_id','reason_code', 'subtitle_position', 'comment']; 

	public function userTasks(){
        return $this->belongsTo(UserTask::class);
    }


    public function comments(){
    	return $this->belongsTo(Comment::class);
    }

}
