<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', function () {
    return view('posts');
});
Route::get('/post/{post}', function ($slug) {
    $filePath = resource_path('posts/' . $slug . '.html');
    if (file_exists($filePath)) {
        $postContent = file_get_contents($filePath);
        return view('post', ['post' => $postContent]);
    } else {
        return view('post', ['post' => 'File not found']);
    }
})->where('post','[A-z_\-]+');