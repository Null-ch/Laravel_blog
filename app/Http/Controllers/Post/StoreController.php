<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\Comment\StroreRequest;
use App\Http\Controllers\Admin\Post\BaseController;

class StoreController extends BaseController
{
    public function __invoke(StroreRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Comment::create($data);
        return redirect()->route('post.index');
    }
}
