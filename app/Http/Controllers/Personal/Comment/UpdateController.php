<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\Comment;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $comment->update();
        return redirect()->route('personal.comment.index');
    }
}
