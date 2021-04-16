<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {
    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Suppression d'un produit</h1>
    <p>&nbsp;</p>

    <form class="center">
        <div class="row mb-2">
            <label for="NameProduit" class="col-sm-2 col-form-label">Nom du produit:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="NameProduit">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Supprimer le produit</button>
    </form>

    <?php
}
?>
