<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest',['except' => 'destroy']);
	}
    public function create()
    {
         $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    	return view('sessions.create', compact('archives'));
    }
    public function destroy()
    {
    	auth()->logout();
    	return redirect()->home();
    }
    public function store()
    {
    	if (! auth()->attempt(request(['email','password']))){

    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    			]);
    	}

    	return redirect()->home();
    }
}
