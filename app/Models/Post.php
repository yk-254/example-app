<?php
namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{
    public function __construct(public $title, public $date,public $body,public $slug)
    {
        
    }

    public static function all()
    {
        return collect(File::files(resource_path('posts')))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($content) => new Post($content->title, $content->date, $content->body(), $content->slug));
    }
    public static function find($slug)
    {
        $filePath = resource_path('posts/' . $slug . '.html');
        if (!file_exists($filePath)) {
            return throw new ModelNotFoundException('Not Found');
        }
        $postContent = cache()->remember("posts.{$slug}", 10, function () use ($filePath) {
            return file_get_contents($filePath);
        });
        return $postContent;
    }
}
