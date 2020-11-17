<?php $title = "My blog"; ?>

<?php ob_start(); ?>

    <h1><?= $post->title ?></h1>
    <p><?= $post->created_at ?></p>

    <p><?= $post->body ?></p>
<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . "/../layouts/default.php"; ?>