<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajouter une catégorie</h1>
    <p>&nbsp;</p>

    <p>Pour vous aider à voir si la catégorie que vous voulez encodé est déjà encodée, il y a une liste en fin de page.</p>

    <?php
    $cat = new CategorieBD($cnx);
    $liste = $cat->getAllCat();
    $nbr = count($liste);

    $nbr = $nbr+1;

    print "Pour entrer un nouvelle catégorie, veuillez entrer '".$nbr. "' dans la rubrique 'Référence'. <br><br>";

    if (isset($_GET['inserer'])) {
        extract($_GET, EXTR_OVERWRITE);
        $cate = $cat->ajoutCategorie($referencecat,$nom_cat);

        if($cate==1){
            print "<br>La catégorie a bien été ajouté !!!<br><br>";
        }
        else{
            print "<br>Veuillez vérifier les informations et réessayer (le nom de la catégorie est déjà encodée dans la base de données) !!!<br><br>";
        }
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
            <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
        </div>
    </form>

    <?php
    include('liste_cats.php');
}
?>