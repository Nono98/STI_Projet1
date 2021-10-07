<?php
if(!isset($_SESSION['Login'])){
    session_start();
}
?>

<!-- Barre de navigation du site web qui sera incluse dans chaque page -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation" style="">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <?php if(isset($_SESSION['Login'])){ ?>

                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./addPublication.php">Ajout d'une publication</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./addSubject.php">Ajout d'un sujet</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./showUsers.php">Voir utilisateurs</a>
                    </li>
                <?php }
                else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Connexion <i class="fas fa-sign-in-alt"></i></a>
                    </li>

                <?php } ?>
            </ul>
            <?php if(isset($_SESSION['Login'])){ ?>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mon profil
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownmenu">
                        <a href="./showPublicationsByUser.php" class="dropdown-item" title="myPublications">Mes publications</a>
                        <a href="./showSubscriptions.php" class="dropdown-item" title="mySubscriptions">Mes abonnements</a>
                        <a href="./showSubscribers.php" class="dropdown-item" title="mySubscribers">Mes abonnés</a>
                        <a href="./showBlockedUsers.php" class="dropdown-item" title="blockedUsers">Personnes bloquées</a>
                        <a href="./showBlockingUsers.php" class="dropdown-item" title="blockingUsers">Personnes me bloquant</a>
                        <a href="./editInformations.php" class="dropdown-item" title="myInformations">Mes informations</a>
                        <a href="./logoutTreat.php" class="dropdown-item" title="disconnection">Déconnexion</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</nav>