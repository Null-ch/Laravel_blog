<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StroreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StroreRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);
        return redirect()->route('admin.categories.index');
    }
}
