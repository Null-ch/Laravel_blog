<?php

namespace App\Http\Controllers\Personal\Comment;


use App\Models\Comment;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $comment->delete();
        return view('personal.main.index');  
    }
}
