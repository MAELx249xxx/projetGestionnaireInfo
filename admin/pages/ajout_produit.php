<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {
    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajout d'un produit</h1>
    <p>&nbsp;</p>

    <form class="row g-3 center">
        <div class="col-md-5">
            <label for="inputNom" class="form-label">Nom:</label>
            <input type="name" class="form-control" id="inputNom">
        </div>
        <div class="col-md-5">
            <label for="inputPrix" class="form-label">Prix:</label>
            <input type="text" class="form-control" id="inputPrix">
        </div>
        <div class="col-md-5">
            <label for="idAnnee" class="form-label">Année de production:</label>
            <input type="text" class="form-control" id="idAnnee">
        </div>
        <div class="col-md-5">
            <label for="idnConst" class="form-label">Identifiant du constructeur:</label>
            <input type="text" class="form-control" id="idnConst">
        </div>
        <div class="col-md-5">
            <label for="idCat" class="form-label">Identifiant de la catégorie:</label>
            <input type="text" class="form-control" id="idCat">
        </div>
        <div class="col-10">
            <button type="submit" class="btn btn-primary">Ajouter le produit</button>
        </div>
    </form>

    <?php
}
?>