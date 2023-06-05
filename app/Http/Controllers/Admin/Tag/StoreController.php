<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StroreRequest;

class StoreController extends Controller
{
    public function __invoke(StroreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }
}
