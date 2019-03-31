<h1>Hello, Main Page</h1>

<?php foreach($posts as $post) : ?>
    <h3><?= $post->title; ?></h3>
<?php endforeach; ?>
