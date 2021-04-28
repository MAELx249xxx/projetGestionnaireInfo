<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajouter une catégorie</h1>
    <p>&nbsp;</p>

    <?php
    $cat = new CategorieBD($cnx);

    if (isset($_GET['inserer'])) {
        $cate = $cat->ajoutCategorie();
    }

    ?>

    <form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="col-md-2">
            <label for="referencecat" class="form-label">Référence</label>
            <input type="text" class="form-control" id="referencecat" name="referencecat">
        </div>
        <div class="col-md-2">
            <label for="nom_cat" class="form-label">Nom de la catégorie</label>
            <input type="text" class="form-control" id="nom_cat" name="nom_cat">
        </div>

        <div class="col-12">
            <input type="hidden" name="id_cat" id="id_cat">
            <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
        </div>
    </form>

    <?php
}
?>