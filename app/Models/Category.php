<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

   protected $fillable = ['name','language']; 


   public function keywords(){
        //return $this->hasMany(CategoryKeyword::class, "category_id", "id")->orderBy('created_at','desc');
        return $this->hasMany(CategoryKeyword::class, "category_id", "id");
   }

}