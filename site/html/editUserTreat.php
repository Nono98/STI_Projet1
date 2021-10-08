<html>
<head></head>
<body>

<?php

// Test si l'appel de ce contrôleur vient bien d'une page du site
if(isset($_SERVER['HTTP_REFERER'])) {

    // Appel de la classe de connexion
    require ('class/dbConnection.php');

    $dbConnection = new dbConnection();
    
    // Récupération des identifiants entrés
    $username = $_POST['inputUsername'];
    $pwd = $_POST['inputPassword'];
    $validity = $_POST['inputValidity'];
    $role = $_POST['inputRole'];

    $dbConnection->editUser($username, $pwd, $validity, $role);
    
    header('Location:./users.php');
} else {
    header('Location:./index.php');
}

?>

</body>
</html>
