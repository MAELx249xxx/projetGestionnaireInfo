<?php
include('./lib/php/verifier_connexion.php');
$cat = new CategorieBD($cnx);
$liste = $cat->getAllCat();
$nbr = count($liste);

if(isset($_SESSION['admin'])){
?>
    <p>&nbsp;</p>
    <h1 class="h1">Liste des catégories</h1>
    <p>&nbsp;</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Identifiant</th>
        <th scope="col">Nom de la catégorie</th>
        <th scope="col">Numéro de référence</th>
    </tr>
    </thead>
    <tbody>

    <?php
    for ($i = 0; $i < $nbr; $i++) {


        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_cat; ?>
            </th>
            <td>
                <span name="nom_cat" id="<?php print $liste[$i]->id_cat; ?>">
                    <?php print $liste[$i]->nom_cat; ?>
                </span>
            </td>
            <td>
                <span name="reference" id="<?php print $liste[$i]->id_cat; ?>">
                    <?php print $liste[$i]->reference; ?>
                </span>
            </td>
        </tr>

        <?php
    }
    ?>

    </tbody>
</table>

    <?php
    }
        ?>