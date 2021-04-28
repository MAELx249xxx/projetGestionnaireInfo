<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajouter / Modifier / Supprimer un produit</h1>
    <p>&nbsp;</p>

    <?php
    $produit = new ProduitBD($cnx);

    if (isset($_GET['editer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $prod = $produit->mise_a_jourProduit($id_prod);
    }

    if (isset($_GET['inserer'])) {
        $prod = $produit->ajoutProduit();
    }

    if (isset($_GET['supprimer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $prod = $produit->supprimerProduit($id_prod);
    }

    ?>

    <form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="col-md-2">
            <label for="referenceproduit" class="form-label">Référence</label>
            <input type="text" class="form-control" id="referenceproduit" name="referenceproduit">
        </div>
        <div class="col-md-6">
            <label for="nom_prod" class="form-label">Dénomination</label>
            <input type="text" class="form-control" id="nom_prod" name="nom_prod">
        </div>
        <div class="col-2">
            <label for="prix" class="form-label">Prix</label>
            <input type="text" class="form-control" id="prix" name="prix">
        </div>
        <div class="col-md-2">
            <label for="annee_prod" class="form-label">Année de production</label>
            <input type="number" class="form-control" id="annee_prod" name="annee_prod">
        </div>
        <div class="col-md-2">
            <label for="id_const" class="form-label">Identifiant du constructeur</label>
            <input type="number" class="form-control" id="id_const" name="id_const">
        </div>
        <div class="col-md-2">
            <label for="id_cat" class="form-label">Identifiant de la catégorie</label>
            <input type="number" class="form-control" id="id_cat" name="id_cat">
        </div>

        <div class="col-12">
            <input type="hidden" name="id_prod" id="id_prod">
            <button type="submit" class="btn btn-primary" id="editer" name="editer">Mettre à jour</button>
            <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
            <button type="submit" class="btn btn-primary" id="supprimer" name="supprimer">Supprimer</button>
        </div>
    </form>

    <?php
}
?>