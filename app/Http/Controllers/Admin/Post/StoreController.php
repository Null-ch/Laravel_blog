<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StroreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StroreRequest $request)
    {
        try {
            $data = $request->validated();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
        } catch (\Exception $exeption) {
            abort(404);
        }
        return redirect()->route('admin.posts.index');
    }
}
