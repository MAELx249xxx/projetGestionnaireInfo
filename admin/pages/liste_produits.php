<?php
include('./lib/php/verifier_connexion.php');
$prod = new ProduitBD($cnx);
$liste = $prod->getAllProduit();
$nbr = count($liste);

if(isset($_SESSION['admin'])){
?>

    <p>&nbsp;</p>
    <h1 class="h1">Liste des produits</h1>
    <p>&nbsp;</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Identifiant</th>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>
        <th scope="col">Année de production</th>
        <th scope="col">Constructeur</th>
        <th scope="col">Catégorie</th>
        <th scope="col">Numéro de référence</th>
    </tr>
    </thead>
    <tbody>

    <?php
    for ($i = 0; $i < $nbr; $i++) {


        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_prod; ?>
            </th>
            <td>
                <span name="nom_prod" id="<?php print $liste[$i]->id_prod; ?>">
                    <?php print $liste[$i]->nom_prod; ?>
                </span>
            </td>
            <td>
                <span name="prix" id="<?php print $liste[$i]->id_prod; ?>">
                    <?php print $liste[$i]->prix; ?>
                </span>
            </td>
            <td>
                <span name="annee_prod" id="<?php print $liste[$i]->id_prod; ?>">
                    <?php print $liste[$i]->annee_prod; ?>
                </span>
            </td>
            <td>
                <span name="nom_const" id="<?php print $liste[$i]->id_prod; ?>">
                    <?php print $liste[$i]->nom_const; ?>
                </span>
            </td>
            <td>
                <span name="nom_cat" id="<?php print $liste[$i]->id_prod; ?>">
                    <?php print $liste[$i]->nom_cat; ?>
                </span>
            </td>
            <td>
                <span name="reference" id="<?php print $liste[$i]->id_prod; ?>">
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