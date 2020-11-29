<?php $this->layout('layouts/default',['title' => 'My blog']) ?>

<main class="col-12">
    <section class="col-14">
        <header class="pb-4 d-flex justify-content-between">
            <h1><?= $this->e($post->title) ?></h1>
        </header>


        <table class="table table-striped">
            <tbody>
            <tr><p><?= $this->e($post->created_at) ?></p></tr>
            <tr><p><?= $this->e($post->body) ?></p></tr>
            </tbody>
        </table>
    </section>
</main>




