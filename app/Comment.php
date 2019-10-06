<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id','created_at'];

    //Compter les commentaires poster par l'utilisateur connecté
    public static function boot()
    {
    	parent::boot();

    	self::created(function($comments){
    		$comments->post->counts_comments = $comments->post->comments->count();
    		$comments->post->save();
    	});

    	self::deleted(function($comments){
    		if($comments->post)
    		{
    			$comments->post->counts_comments = $comments->post->comments->count();
    			$comments->post->save();
    		}
    	});

    	return true;
    }

    public function post()
    {
    	return $this->belongsTo("App\Post");
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
