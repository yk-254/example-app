<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    // return view('posts', ['posts' => Post::all()]);
    return view('welcome');
});
Route::get('/posts', function () {
    return view('posts');
});
Route::get('/post/{post}', function ($slug) {
    $postContent = Post::find($slug);
    dump($postContent);
    return view('post', ['post' => $postContent]);
})->where('post', '[A-z_\-]+');
