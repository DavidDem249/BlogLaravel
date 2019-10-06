<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

	public function admin()
	{
		$comments = Comment::all();
		return View('comments.admin', compact('comments'));
	}

	public function delete($id)
	{
		$comment = Comment::find($id);
		$comment->delete();
		return redirect()->back()->with('success','Le commentaire a bien été supprimé');
	}

    public function create($id)
    {
    	$post = Post::find($id);

    	$validate = request()->validate([

    		'comment' => 'required',
    	]);

    	if($validate)
    	{
    		Comment::create([

    			'user_id' => auth()->user()->id,
    			'post_id' => $post->id,
    			'content' => request('comment'),
    		]);

    		return redirect()->back()->with('success','Commentaire envoyer avec succès');
    	}
    }
}
