<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Carbon\Carbon;
use App\Repositories\Posts;
use App\Http\Requests\PostsForm;

class PostsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index()

    {
        // $posts = Post::latest();
        $posts = Posts::latest();
       
        
        return view('posts.index', compact('posts'));
    	// return response()->json($posts); //----> return to json


    }

    public function show(Post $post)

    {   
       

    	return view('posts.show', compact('post'));

    }

     public function create()
    {
        
    	return view('posts.create');

    }

    public function store(PostsForm $form)
    {
    	// Post::create(request()->all());
        $form->addPost();
    	return redirect('/');

    }
}
