<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function($category){
            $category->slug = str_slug($category->name);
        });
    }

    public function posts(){
       return $this->hasMany(Post::class,'id');
   }
}
