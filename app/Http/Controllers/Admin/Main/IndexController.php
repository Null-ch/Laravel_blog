<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(Tag $tag, Category $category, Post $posts)
    {
        return view('admin.main.index', compact('tag', 'category', 'posts'));  
    }
}
