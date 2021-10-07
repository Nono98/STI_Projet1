<html>
<head></head>
<body>

<?php

// Test si l'appel de ce contrôleur vient bien d'une page du site
if(isset($_SERVER['HTTP_REFERER'])) {

    // Appel de la classe de connexion
    require ('class/dbConnection.php');

    $dbConnection = new dbConnection();

    session_start();

    // Récupération des entrées
    $username = $_SESSION['Login'];
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d-H-i-s');
    $to = $_POST['inputTo'];
    $subject = $_POST['inputSubject'];
    $message = $_POST['inputMessage'];

    $dbConnection->newMessage($username, $date, $to, $subject, $message);

    header('Location:./index.php');
} else {
    header('Location:./index.php');
}

?>

</body>
</html>
