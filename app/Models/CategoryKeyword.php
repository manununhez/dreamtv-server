<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryKeyword extends Model
{
   	protected $fillable = ['category_id','keyword']; 

	public function category(){
        return $this->belongsTo(Category::class);
    }
}
