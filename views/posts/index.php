<?php ob_start(); ?>
<main class="col-12">
    <section class="col-14">
        <header class="pb-4 d-flex justify-content-between">
            <h4>Liste des Articles</h4>
            <a class="btn btn-primary" href="/articles/create">Ajouter un article</a>
        </header>

        <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success'] ?>
        </div>


        <?php endif; ?>
        <?= $test ?>
        <table class="table table-striped">
            <tbody>
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <th><a href="/articles/show?id=<?= $post->id ?>"><?= $post->created_at_fr ?> - <?= $post->title ?></th>

                    <td>
                        <a href="/articles/edit?id=<?= $post->id ?>" class="btn btn-warning">Modifier</a>
                        <a onclick="return confirm('Are you sure?')" href="/articles/delete?id=<?= $post->id ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>



<?php $content = ob_get_clean(); ?>

<?php require __DIR__ . "/../layouts/default.php"; ?>

