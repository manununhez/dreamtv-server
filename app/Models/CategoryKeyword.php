<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryKeyword extends Model
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

   	protected $fillable = ['category_id','keyword']; 

	public function category(){
        return $this->belongsTo(Category::class);
    }
}