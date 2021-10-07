<?php
    // Appel de la classe de connexion
    require ('class/dbConnection.php');

    $dbConnection = new dbConnection();

    $username = $_POST['userToEdit'];

    $user = $dbConnection->getUser($username);
?>

<!DOCTYPE html>
<html lang="fr">
<?php include_once('./include/header.inc.php'); ?>
<body>
<?php include_once('./include/navbar.inc.php'); ?>
<div class="container">
    <div class="jumbotron text-center">
        <h1>Edit user <?php echo $user['username'] ?></h1>
    </div>
    <div class="row justify-content-lg-center">
        <div class="col-lg-6">
            <!-- Formulaire d'édition d'utilisateur' -->
            <form action="./editUserTreat.php" method="post">
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-8">Password<span style="color: red">*</span></label>
                    <div class="col-lg-12">
                        <input type="password" class="form-control form-connexion-input" id="inputPassword" name="inputPassword" placeholder="Password" value="<?php echo $user['password'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputValidity" class="col-lg-8">Validity<span style="color: red">*</span></label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control form-connexion-input" id="inputValidity" name="inputValidity" placeholder="0 or 1" value="<?php echo $user['validty'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputRole" class="col-lg-8">Role<span style="color: red">*</span></label>
                    <div class="col-lg-12">
                        <input type="text" class="form-control form-connexion-input" id="inputRole" name="inputRole" placeholder="0 or 1" value="<?php echo $user['role'] ?>">
                    </div>
                </div>

                <input type="hidden" id="inputUsername" name="inputUsername" value="<?php echo $user['username'] ?>"/>

                <div class="form-group pull-right">
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-outline-primary">Edit user</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once('./include/footer.inc.php'); ?>
</body>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</html>