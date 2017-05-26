<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class RegistrationController extends Controller
{
    public function create()
    {
         $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    	return view('registration.create',compact('archives'));
    }
    public function store()
    {
    	$this->validate(request(),[
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    		]);

    	$user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
            ]);


    	auth()->login($user);

    	return redirect()->home();
    }
}
