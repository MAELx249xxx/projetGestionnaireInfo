<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajouter / Modifier / Supprimer un produit</h1>
    <p>&nbsp;</p>

    <?php
    $produit = new ProduitBD($cnx);
    $liste = $produit->getAllProduit();
    $nbr = count($liste);
    $nbr = $nbr+1;

    $cat = new CategorieBD($cnx);
    $liste_cats = $cat->getAllCat();
    $nbr_cat = count($liste_cats);

    $const = new ConstructeurBD($cnx);
    $liste_consts = $const->getAllConstructeur();
    $nbr_const = count($liste_consts);

    print "Pour entrer un nouveau produit, veuillez entrer '".$nbr. "' dans la rubrique 'Référence'. <br><br>";

    if (isset($_GET['inserer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $prod = $produit->ajoutProduit($referenceproduit,$nom_prod,$prix,$annee_prod,$choix_categorie,$choix_constructeur);

        if($prod==1){
            print "<br>Le produit a bien été ajouté !!!<br><br>";
        }else{
            print "<br>!!! Veuillez enregistrer le produit avec un autre nom !!!<br><br>";
        }
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
    <p>Pour la référence, si vous voulez modifier ou supprimer un produit. Entrez la référence du produit recherché.</p>
    <p>Si vous voulez enregistrer un nouveau produit. Entrez une référence ne se trouvant pas encore dans la base de données.</p>
    <p>Pour vous aidez à trouver la référence, une liste se trouve en bas de page !!!</p>
    <p>La suppression est une action irréversible !!!</p>
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
            <input type="number" step="0.01" class="form-control" id="prix" name="prix">
        </div>
        <div class="col-md-2">
            <label for="annee_prod" class="form-label">Année de production</label>
            <input type="number"  class="form-control" id="annee_prod" name="annee_prod">
        </div>
        <div class="col-md-2">
            <label for="choix_categorie" class="form-label">Choix catégorie</label>
            <select class="form-select" name="choix_categorie" id="choix_categorie">
                <option id="choix_categorie" value="">Choix</option>
                <?php
                for ($i=0;$i<$nbr_cat;$i++){
                    ?>
                    <option id="choix_categorie" value="<?php print $liste_cats[$i]->id_cat;?>">
                        <?php print $liste_cats[$i]->nom_cat;?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="choix_constructeur" class="form-label">Choix Constructeur</label>
            <select class="form-select" name="choix_constructeur" id="choix_constructeur">
                <option id="choix_constructeur" value="">Choix</option>
                <?php
                for ($j=0;$j<$nbr_const;$j++){
                    ?>
                    <option id="choix_constructeur" value="<?php print $liste_consts[$j]->id_const;?>">
                        <?php print $liste_consts[$j]->nom_const;?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="col-12">
            <input type="hidden" name="id_prod" id="id_prod">
            <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
            <button type="submit" class="btn btn-primary" id="supprimer" name="supprimer">Supprimer</button>
        </div>
    </form>

    <button type="submit" class="btn btn-primary" id="editer_prod" name="editer_prod">Mettre à jour</button>

    <br>
    <br>

    <?php
    include('liste_produits.php');
}
?>