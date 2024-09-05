<!DOCTYPE html>
<html lang="en">

<head>
    <title>Yekta's Blog</title>
    <link rel="stylesheet" href="/app.css">

</head>

<body>
    @foreach ($posts as $post)
        <article>
            <a href="/post/<?= $post->slug ?>">
                <h1> <?= $post->title ?> </h1>
                <div> {!! $post->body !!} </div>
        </article>
    @endforeach
</body>

</html>
