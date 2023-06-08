<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Models\Post;
use App\Http\Controllers\Admin\Post\BaseController;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('personal.liked.index');
    }
}
