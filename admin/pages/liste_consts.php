<?php
include('./lib/php/verifier_connexion.php');
$cons = new ConstructeurBD($cnx);
$liste = $cons->getAllConstructeur();
$nbr = count($liste);

if(isset($_SESSION['admin'])){
?>
    <p>&nbsp;</p>
    <h1 class="h1">Liste des constructeurs</h1>
    <p>&nbsp;</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Identifiant</th>
        <th scope="col">Nom du constructeur</th>
        <th scope="col">Pays</th>
        <th scope="col">Numéro de référence</th>
    </tr>
    </thead>
    <tbody>

    <?php
    for ($i = 0; $i < $nbr; $i++) {


        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_const; ?>
            </th>
            <td>
                <span name="nom_const" id="<?php print $liste[$i]->id_const; ?>">
                    <?php print $liste[$i]->nom_const; ?>
                </span>
            </td>
            <td>
                <span name="pays" id="<?php print $liste[$i]->id_const; ?>">
                    <?php print $liste[$i]->pays; ?>
                </span>
            </td>
            <td>
                <span name="reference" id="<?php print $liste[$i]->id_const; ?>">
                    <?php print $liste[$i]->reference; ?>
                </span>
            </td>
        </tr>

        <?php
    }
    ?>

    </tbody>
</table>

    <br>
    <br>

    <a href="index_.php?page=ajout_modif_supp_produit.php">Lien vers l'ajout / modification/ suppression d'un produit.</a><br>

    <?php
    }
        ?>