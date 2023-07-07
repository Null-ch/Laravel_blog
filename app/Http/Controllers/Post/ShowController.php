<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $postId = $post->id;
        $comments = Comment::all();
        $comments = $comments->where('post_id', $postId)->all();

        return view('post.show', compact('post', 'comments'));
    }
}
