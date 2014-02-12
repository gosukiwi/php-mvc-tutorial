<!DOCTYPE html>
<html>
    <head>
        <title>Example View</title>
    </head>
    <body>
        <h1>All posts</h1>
        
        <?php foreach($posts as $post): ?>
            <h1><?php echo $post->title; ?> - ID: <?php echo $post->id; ?></h1>
            <h2>Created on <?php echo date('d M Y', $post->created); ?></h2>
            <?php echo $post->content; ?>
            <hr />
        <?php endforeach; ?>
    </body>
</html>
