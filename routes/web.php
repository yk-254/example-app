<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    $poost = collect(File::files(resource_path('posts')))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($content) => new Post($content->title, $content->date, $content->body(), $content->slug));

    return view('posts', ['posts' => $poost]);
    // return view('welcome');
});
Route::get('/posts', function () {
    return view('posts');
});
Route::get('/post/{post}', function ($slug) {
    $postContent = Post::find($slug);
    dump($postContent);
    return view('post', ['post' => $postContent]);
})->where('post', '[A-z_\-]+');
