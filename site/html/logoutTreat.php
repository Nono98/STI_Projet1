<?php

// Test si l'appel de ce contrôleur vient bien d'une page du site
if(isset($_SERVER['HTTP_REFERER'])) {
    // Suppression de la variable $_SESSION pour la déconnexion de l'utilisateur
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    // Redirection vers la page d'accueil
    header('Location:./index.php');
} else {
    // Redirection vers la page d'accueil
    header('Location:./index.php');
}