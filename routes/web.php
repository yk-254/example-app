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
    if (!file_exists($filePath)) {
        return redirect('/');
        
    } 
    $postContent = cache()->remember("posts.{$slug}",10,function() use ($filePath){
        dump('Testing cache');
        return file_get_contents($filePath);
    });

        return view('post', ['post' => $postContent]);
        
    
})->where('post','[A-z_\-]+');