<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return view('personal.liked.show', compact('post'));  
    }
}
