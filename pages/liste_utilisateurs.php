<?php
$utilisateur = new UtilisateurBD($cnx);
$liste = $utilisateur->getAllUtilisateur();
$nbr = count($liste);

    ?>
    <p>&nbsp;</p>
    <h1 class="h1">Liste des utilisateurs</h1>
    <p>&nbsp;</p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Identifiant</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Pays</th>
        </tr>
        </thead>
        <tbody>

        <?php
        for ($i = 0; $i < $nbr; $i++) {


            ?>
            <tr>
                <th scope="row">
                    <?php print $liste[$i]->id_utili; ?>
                </th>
                <td>
                <span name="nom_utili" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->nom_utili; ?>
                </span>
                </td>
                <td>
                <span name="prenom" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->prenom; ?>
                </span>
                </td>
                <td>
                <span name="pays" id="<?php print $liste[$i]->id_utili; ?>">
                    <?php print $liste[$i]->pays; ?>
                </span>
                </td>
            </tr>

            <?php
        }
        ?>

        </tbody>
    </table>
