<!DOCTYPE html>
<html lang="fr">
<?php include_once('./include/header.inc.php'); ?>
<body>
<?php include_once('./include/navbar.inc.php'); ?>
<div class="container">
    <!-- Test si la variable $_SESSION['Login'] n'existe pas pour afficher le formulaire de connexion -->
    <?php if (!isset($_SESSION['Login'])) { ?>
        <div class="jumbotron text-center">
            <h1>Connect to the platform</h1>
        </div>
        <div class="row justify-content-lg-center">
            <div class="col-lg-6">
                <!-- Formulaire de connexion -->
                <form action="./loginTreat.php" method="post">
                    <div class="form-group">
                        <label for="inputLogin" class="col-lg-8">Username</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control form-connexion-input" id="inputLogin" name="inputLogin" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-8">Password</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control form-connexion-input" id="inputPassword" name="inputPassword" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group pull-right">
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-outline-primary">Connexion</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Si un utilisateur est connecté, affiche le fil d'actualité -->
    <?php } else { ?>
        <h1>Connecté ouaiiiis</h1>
        <?php if(isset($_SESSION['IsAdmin'])){ ?>
            <h2>Admin</h2>
        <?php } ?>
    <?php } ?>
</div>
<?php include_once('./include/footer.inc.php'); ?>
</body>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</html>