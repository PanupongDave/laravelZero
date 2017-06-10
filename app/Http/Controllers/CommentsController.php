<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CommentsForm;

class CommentsController extends Controller
{ //Post $post
    public function store(CommentsForm $form,Post $post) 
    {   
        $form->comment($post);
    	return back();
    }
}
