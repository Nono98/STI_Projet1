<!DOCTYPE html>
<html lang="fr">
<?php include 'include/header.inc.php'; ?>
<body>
<?php include "include/navbar.inc.php" ?>
<div class="container">
    <!-- Test si la variable $_SESSION['Login'] n'existe pas pour afficher le formulaire de connexion -->
    <?php if (!isset($_SESSION['Login'])) { ?>
        <div class="jumbotron text-center">
            <h1>Connexion à la plateforme</h1>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-lg-6">
                <!-- Formulaire de connexion -->
                <form action="./loginTreat.php" method="post">
                    <div class="form-group">
                        <label for="inputLogin" class="col-lg-8">Nom d'utilisateur</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control form-connexion-input" id="inputLogin" name="inputLogin" placeholder="Nom d'utilisateur">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-8">Mot de passe</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control form-connexion-input" id="inputPassword" name="inputPassword" placeholder="Mot de passe">
                        </div>
                    </div>

                    <div class="form-group pull-right">
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-outline-primary">Connexion</button>
                        </div>
                    </div>
                </form>
                <form action="./newAccount.php" method="post">
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-outline-primary">Nouveau compte</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Si un utilisateur est connecté, affiche le fil d'actualité -->
    <?php } else { ?>

    <?php } ?>
</div>
<?php include "include/footer.inc.php" ?>
</body>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</html>