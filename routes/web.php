<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    $files = File::files(resource_path('posts'));
    $poost=[];
    foreach ($files as $file) {
        $content = YamlFrontMatter::parseFile($file);
        $poost[]=new Post(
            $content -> title,
            $content -> date,
            $content -> body(),
            $content -> slug
        );
    }
    // $du=YamlFrontMatter::parseFile(resource_path('posts/my-fourth-post.html'));
    // dd($poost);
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
