<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        //validate
        request()->validate([
            'body' => 'required'
        ]);


        //add comment to given post.
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->input('body')
        ]);
        
        return back();
    }
}
