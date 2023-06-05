<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Admin\Main\IndexController as IndexControllerAdmin;

use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Admin\Category\IndexController as IndexControllerCategory;

use App\Http\Controllers\Admin\Tag\EditController as TagEditController;
use App\Http\Controllers\Admin\Tag\ShowController as TagShowController;
use App\Http\Controllers\Admin\Tag\StoreController as TagStoreController;
use App\Http\Controllers\Admin\Tag\CreateController as TagCreateController;
use App\Http\Controllers\Admin\Tag\DeleteController as TagDeleteController;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdateController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;

use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;
use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\DeleteController as PostDeleteController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;


Route::group(['App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class);
});
Route::group(['prefix' => 'admin'], function () {
        Route::get('/', IndexControllerAdmin::class)->name('admin.index');
});
Route::group(['prefix' => 'admin/categories'], function () {
    Route::get('/', IndexControllerCategory::class)->name('admin.category.index');
    Route::get('/create', CreateController::class)->name('admin.category.create');
    Route::post('/', StoreController::class)->name('admin.category.store');
    Route::get('/{category}', ShowController::class)->name('admin.category.show');
    Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
    Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
    Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
});

Route::group(['prefix' => 'admin/tag'], function () {
    Route::get('/', TagIndexController::class)->name('admin.tag.index');
    Route::get('/create', TagCreateController::class)->name('admin.tag.create');
    Route::post('/', TagStoreController::class)->name('admin.tag.store');
    Route::get('/{tag}', TagShowController::class)->name('admin.tag.show');
    Route::get('/{tag}/edit', TagEditController::class)->name('admin.tag.edit');
    Route::patch('/{tag}', TagUpdateController::class)->name('admin.tag.update');
    Route::delete('/{tag}', TagDeleteController::class)->name('admin.tag.delete');
});

Route::group(['prefix' => 'admin/post'], function () {
    Route::get('/', PostIndexController::class)->name('admin.posts.index');
    Route::get('/create', PostCreateController::class)->name('admin.post.create');
    Route::post('/', PostStoreController::class)->name('admin.post.store');
    Route::get('/{post}', PostShowController::class)->name('admin.post.show');
    Route::get('/{post}/edit', PostEditController::class)->name('admin.post.edit');
    Route::patch('/{post}', PostUpdateController::class)->name('admin.post.update');
    Route::delete('/{post}', PostDeleteController::class)->name('admin.post.delete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
