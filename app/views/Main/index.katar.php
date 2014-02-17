<!DOCTYPE html>
<html>
    <head>
        <title>Example View</title>
    </head>
    <body>
        <h1>All posts</h1>

        @for $post in $posts
            <h1>{{ $post->title }} - ID: {{ $post->id }}</h1>
            <h2>Created on {{ date('d M Y', $post->created) }}</h2>
            {{ $post->content }}
            <hr />
        @endfor
    </body>
</html>
