<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use App\Comment;

class CommentsForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'body' => 'required'
        ];
    }
    public function comment(Post $post)
    {
            $comment = Comment::create([
                'body' => request('body'),
                'post_id' => $post->id,
                'user_id' => auth()->user()->id
            ]);

    }
}
