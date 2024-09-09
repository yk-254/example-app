<?php
namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(public $title, public $date, public $body, public $slug)
    {
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts')))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($content) => new Post($content->title, $content->date, $content->body(), $content->slug))
                ->sortByDesc('date');
        });
    }
    public static function find($slug)
    {
        $post= static::all()->firstWhere('slug', $slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
