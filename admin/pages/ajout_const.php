<?php
include('./lib/php/verifier_connexion.php');

if (isset($_SESSION['admin'])) {

    ?>

    <p>&nbsp;</p>
    <h1 class="h1">Ajouter un constructeur</h1>
    <p>&nbsp;</p>

    <?php
    $const = new ConstructeurBD($cnx);
    $liste = $const->getAllConstructeur();
    $nbr = count($liste);

    $nbr = $nbr+1;

    print "Veuillez entrer '".$nbr. "' dans la rubrique 'Référence'. <br><br>";

    if (isset($_GET['inserer'])) {
        $cons = $const->ajoutConstructeur();
    }


    ?>

    <form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="col-md-2">
            <label for="referenceconst" class="form-label">Référence</label>
            <input type="text" class="form-control" id="referenceconst" name="referenceconst" placeholder="A1 ou 1">
        </div>
        <div class="col-md-2">
            <label for="nom_const" class="form-label">Nom du constructeur</label>
            <input type="text" class="form-control" id="nom_const" name="nom_const">
        </div>
        <div class="col-2">
            <label for="pays" class="form-label">Pays</label>
            <input type="text" class="form-control" id="pays" name="pays">
        </div>

        <div class="col-12">
            <input type="hidden" name="id_const" id="id_const">
            <button type="submit" class="btn btn-primary" id="inserer" name="inserer">Enregistrer</button>
        </div>
    </form>

    <?php
}
?>