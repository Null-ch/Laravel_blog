<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;

use App\Http\Controllers\Admin\Category\IndexController as IndexControllerCategory;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\Category\UpdateController;

use App\Http\Controllers\Admin\Tag\EditController as TagEditController;
use App\Http\Controllers\Admin\Tag\CreateController as TagCreateController;
use App\Http\Controllers\Admin\Tag\DeleteController as TagDeleteController;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdateController;
use App\Http\Controllers\Admin\Tag\ShowController as TagShowController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\Tag\StoreController as TagStoreController;

use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\DeleteController as PostDeleteController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;

use App\Http\Controllers\Admin\User\EditController as UserEditController;
use App\Http\Controllers\Admin\User\ShowController as UserShowController;
use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Admin\User\StoreController as UserStoreController;
use App\Http\Controllers\Admin\User\CreateController as UserCreateController;
use App\Http\Controllers\Admin\User\DeleteController as UserDeleteController;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdateController;


use App\Http\Controllers\Admin\Main\IndexController as IndexControllerAdmin;
use App\Http\Controllers\Personal\Main\IndexController as PersonalIndexController;
use App\Http\Controllers\Personal\Liked\IndexController as PersonaLikedlIndexController;
use App\Http\Controllers\Personal\Liked\ShowController as PersonaLikedlShowController;
use App\Http\Controllers\Personal\Liked\DeleteController as PersonaLikedDeletelController;

use App\Http\Controllers\Personal\Comment\IndexController as PersonaCommentlIndexController;
use App\Http\Controllers\Personal\Comment\UpdateController as PersonaCommentlUpdateController;
use App\Http\Controllers\Personal\Comment\EditController as PersonaCommentlEditController;
use App\Http\Controllers\Personal\Comment\DeleteController as PersonaCommentlDeleteController;

use App\Http\Controllers\Post\IndexController as OnePostIndexController;


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['App\Http\Controllers\Main', 'middleware' => ['auth']], function () {
    Route::get('/', IndexController::class);
});

Route::group(['prefix' => 'posts',], function () {
    Route::get('/', App\Http\Controllers\Post\IndexController::class)->name('post.index');
    Route::get('/{post}', App\Http\Controllers\Post\ShowController::class)->name('post.show');
    Route::post('/', App\Http\Controllers\Post\StoreController::class)->name('post.store');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/', IndexControllerAdmin::class)->name('admin.index');
});

Route::middleware(['auth', 'admin', 'verified'])->group(function () {
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

    Route::group(['prefix' => 'admin/user'], function () {
        Route::get('/', UserIndexController::class)->name('admin.users.index');
        Route::get('/create', UserCreateController::class)->name('admin.user.create');
        Route::post('/', UserStoreController::class)->name('admin.user.store');
        Route::get('/{user}', UserShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', UserEditController::class)->name('admin.user.edit');
        Route::patch('/{user}', UserUpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', UserDeleteController::class)->name('admin.user.delete');
    });
});

Route::group(['prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', PersonalIndexController::class)->name('personal.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['prefix' => 'personal/liked'], function () {
        Route::get('/', PersonaLikedlIndexController::class)->name('personal.liked.index');
        Route::get('/{post}', PersonaLikedlShowController::class)->name('personal.liked.show');
        Route::delete('/{post}', PersonaLikedDeletelController::class)->name('personal.liked.delete');
    });

    Route::group(['prefix' => 'personal/comment'], function () {
        Route::get('/', PersonaCommentlIndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', PersonaCommentlEditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', PersonaCommentlUpdateController::class)->name('personal.comment.update');
        Route::delete('/{comment}', PersonaCommentlDeleteController::class)->name('personal.comment.delete');
    });
});
