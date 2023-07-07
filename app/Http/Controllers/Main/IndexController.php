<?php

namespace App\Http\Controllers\Main;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('post.index');
    }
}
