<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::paginate(5);
    	return View('posts.index', compact('posts'));
    }

    public function show($slug)
    {
    	$post = Post::where('slug', $slug)->firstOrFail();
    	$author = $post->user;
    	$comments = $post->comments;
    	return View('posts.show',compact('post','author','comments'));
    }

    public function admin()
    {
        $posts = Post::all();
        return View('posts.admin',compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return View('posts.edit',compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->destroy($post->id);
        return redirect()->back()->with('success','Le post a bien été supprimé');
    }

    public function update($id)
    {
        $validate = request()->validate([
            'name' => 'required|min:3',
            'content' => 'required|min:5',
        ]);

        if(!$validate)
        {
            return redirect()->back()->withErrors($validate);
        }else
        {
            $post = Post::find($id);
            $post->name = request('name');
            $post->content = request('content');
            $post->slug = Str::slug(request('name'));
            $post->save();
            return redirect()->back()->with('success','Le post a bien été modifié avec succès !');
        }
    }

    public function create()
    {
        return View('posts.create');
    }

    public function sauvegarder()
    {
        $valid = request()->validate([

            'name' => 'required|min:3',
            'content' => 'required|min:5',
        ]);

        if($valid)
        {
            Post::create([

                'name' => request('name'),
                'content' => request('content'),
                'slug' => Str::slug(request('name')),
                'user_id' => auth()->user()->id,
            ]);
            return redirect()->back()->with('success','Insertion effectuées avec succès');
        }
        else{
            return redirect()->back()->with('error','Remplissez correctement les champs');
        }
    }
}
