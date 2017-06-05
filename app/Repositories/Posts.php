<?php

namespace App\Repositories;

use App\Post;
use App\Redis;

class Posts
{
	protected $redis;
	
	public function __construct(Redis $redis)
	{
		$this->redis = Post::all();
	}

	public static function all()
	{
		return Post::all();
	}

	public static function archives()
  	{
  		return Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get();
            
  	}

}