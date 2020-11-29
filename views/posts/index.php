<?php $this->layout('layouts/default',['title' => 'My blog']);
$parsedown = new Parsedown(); ?>



<main class="col-12">
    <section class="col-14">
        <header class="pb-4 d-flex justify-content-between">
            <h4><?= $parsedown->text('Liste des _Articles_') ?></h4>
            <a class="btn btn-primary" href="/articles/create">Ajouter un article</a>
        </header>

        <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success'] ?>
        </div>
        <?php endif; ?>


        <table class="table table-striped">
            <tbody>
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <th><a href="/articles/show/<?= $this->e($post->id) ?>"><?= $this->e($post->created_at_fr) ?> - <?= $this->e($post->title) ?></th>

                    <td>
                        <a href="/articles/edit/<?= $this->e($post->id) ?>" class="btn btn-warning">Modifier</a>
                        <form method="POST" action="/articles/delete/<?= $this->e($post->id) ?>">
                            <input type="hidden" value="DELETE" name="_method">
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>




