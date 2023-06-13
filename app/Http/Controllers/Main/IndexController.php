<?php

namespace App\Http\Controllers\Main;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $categoies = Category::get();
        $randomPosts = Post::paginate(3);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return view('main.index', compact('posts', 'randomPosts', 'likedPosts', 'categoies'));  
    }
}
