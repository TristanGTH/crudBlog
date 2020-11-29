<?php $this->layout('layouts/default',['title' => 'My blog']);
$faker = Faker\Factory::create();?>


<main class="col-12">
    <section class="col-14">
        <header class="pb-4 d-flex justify-content-between">
            <h1><?= $faker->word ?></h1>
        </header>


        <table class="table table-striped">
            <tbody>
            <tr><p><?= $faker->address ?></p></tr>
            </tbody>
        </table>
    </section>
</main>
