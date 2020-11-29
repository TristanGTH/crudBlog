<?php $this->layout('layouts/default',['title' => 'My blog']) ?>


<section class="col-12">
    <header class="pb-3">
        <h4>Ajouter un produit</h4>
    </header>
    <?php if (isset($_SESSION['errors'])):?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['errors'] ?>
    </div>
    <?php endif; ?>
    <div class="tab-content">
        <div class="tab-pane container-fluid active" id="infos" role="tabpanel">


            <form method="post" action="/articles">

                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input class="form-control"  type="text" placeholder="Titre" name="title" value="<?= isset($_SESSION['old']['title']) ? $_SESSION['old']['title'] : '' ?>"/>
                </div>
                <div class="form-group">
                    <label for="content">Contenu :</label>
                    <input class="form-control"  type="text" placeholder="Contenu" name="content" value="<?= isset($_SESSION['old']['content']) ? $_SESSION['old']['content'] : '' ?>"/>
                </div>


                <div class="text-right">
                    <input class="btn btn-success" type="submit" name="submit" value="Ajouter" />
                </div>


            </form>
        </div>
    </div>
</section>






