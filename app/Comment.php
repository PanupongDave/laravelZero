<?php

namespace App;

class Comment extends Model
{
    // $comment->post
    public function post()
    {
    	return $this->belogsTo(Post::class);
    }

     public function user()
    {
    	return $this->belogsTo(User::class);
    }

}
