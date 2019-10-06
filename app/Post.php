<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\User;
class Post extends Model
{
    protected $guarded = ['id','created_at'];

    public static function boot()
    {
    	parent::boot();

    	self::created(function($post){
    		//Pour ne pas qu'il crée une valeur null
    		$post->counts_comments = 0;
    	});

    	self::deleted(function($post){
    		$comments = $post->comments;

    		foreach($comments as $comment) {

    			$comment->delete();
    		}
    	});

    	return true;

    }

    public function user()
    {
    	return $this->belongsTo("App\User");
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
}
