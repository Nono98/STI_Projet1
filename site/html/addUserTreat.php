<html>
<head></head>
<body>

<?php

// Test si l'appel de ce contrôleur vient bien d'une page du site
if(isset($_SERVER['HTTP_REFERER'])) {
    // Appel de la classe de connexion
    require ('class/dbConnection.php');

    $dbConnection = new dbConnection();

    // Récupération des données entrées
    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];
    $validity = $_POST['inputValidity'];
    $role = $_POST['inputRole'];

    $dbConnection->addUser($username, $password, $validity, $role);

    header('Location:./index.php');
} else {
    header('Location:./index.php');
}

?>

</body>
</html>
