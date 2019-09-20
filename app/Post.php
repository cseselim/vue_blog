<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function($post){
            $post->slug = str_slug($post->title);
        });
    }


    public  function user(){
	    return $this->belongsTo(User::class,'user_id','id');
	}
    public  function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }


}
