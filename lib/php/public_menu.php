<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index_.php?page=accueil.php">Accueil</a>
                </li>
                <?php
                if (!isset($_SESSION['utilisateur'])) {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index_.php?page=se_connecter.php">Se connecter</a>
                    </li>
                    <?php
                }
                if (!isset($_SESSION['utilisateur'])) {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index_.php?page=inscrire.php">S'inscrire</a>
                    </li>
                    <?php
                }
                if (isset($_SESSION['utilisateur'])) {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index_.php?page=modif_info_supp_compte.php">Modifier ses informations ou supprimer son compte</a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Recherches
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        if (isset($_SESSION['utilisateur'])) {

                            ?>
                            <li><a class="dropdown-item" href="index_.php?page=liste_utilisateurs.php">Liste des
                                    utilisateurs</a></li>
                            <?php
                        }
                        ?>
                        <li><a class="dropdown-item" href="index_.php?page=liste_produits.php">Liste des produits</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index_.php?page=recherche_produit.php">Recherche du produit
                                sur son nom</a></li>
                    </ul>
                </li>
                <?php
                if (isset($_SESSION['utilisateur'])) {

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index_.php?page=deconnexion.php">Déconnexion</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>