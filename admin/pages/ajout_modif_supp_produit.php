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

    <p>Avant d'enregistrer un nouveau produit, veuillez vérifier que la catégorie et le constructeur que vous voulez enregistrer pour ce produit soient dans la base de données.</p>
    <p>Pour ce faire, aller dans le menu en haut de la page et déroulez le menu 'Catégories' ou menu 'Constructeurs' et ensuite 'liste des catégories' ou 'liste des constructeurs'.</p>
    <p>Vous pouvez également utiliser les liens ici dessous.</p>
    <a href="index_.php?page=liste_consts.php">Lien vers la liste des constucteurs.</a><br>
    <a href="index_.php?page=liste_cats.php">Lien vers la liste des catégories.</a><br><br>

    <p>Si ils y sont, vous pouvez revenir ici. Si pas, je vous invite à les ajouter en utilisant les ajouts des "constructeurs" et "catégories" se trouvant dans les menus y apparantant.</p>
    <p>Vous pouvez également utiliser les liens ici dessous.</p>
    <a href="index_.php?page=ajout_const.php">Lien vers l'ajout d'un constructeur.</a><br>
    <a href="index_.php?page=ajout_cat.php">Lien vers l'ajout d'une catégorie.</a><br>

    <br>
    <p> Pour la référence, si vous voulez modifier ou supprimer un produit. Entrez la référence du produit recherché.</p>
    <p> Si vous voulez enregistrer un nouveau produit. Entrez une référence ne se trouvant pas encore dans la base de données.</p>
    <br>
    <br>

    <form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="col-md-2">
            <label for="referenceproduit" class="form-label">Référence</label>
            <input type="text" class="form-control" id="referenceproduit" name="referenceproduit" placeholder="1 ou A1 ou autre">
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