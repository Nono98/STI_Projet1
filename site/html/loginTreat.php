<?php

// Appel de la classe de connexion
/*require ('class/dbConnection.php');

$dbConnection = new dbConnection();

$dbConnection->addUsers();

$result = $dbConnection->getUsers();

foreach($result as $row) {
    echo "Username: " . $row['username'] . "<br/>";
    echo "Password: " . $row['password'] . "<br/>";
    echo "Validity: " . $row['validity'] . "<br/>";
    echo "Role: " . $row['role'] . "<br/>";
    echo "<br/>";
}

// Récupération des identifiants entrés
$Pseudo = $_POST['inputLogin'];
$Password = $_POST['inputPassword'];

// Test des informations
$testInformations = new classLogin($Pseudo,$Password);
$bool = $testInformations->testInformations();

session_start();

// Si cela correspond, on ouvre la connexion, sinon on affiche un message d'erreur sur la page de connexion
if($bool == true && isset($_SESSION['Login']))
{
    //header('Location:./index.php');
}
else
{
    //header('Location:./index.php?alert=wrongId');
}*/

// Set default timezone
date_default_timezone_set('UTC');

echo "1" . "<br/>";

// Create (connect to) SQLite database in file
$file_db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
// Set errormode to exceptions
$file_db->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

echo "2" . "<br/>";

// Array with some test data to insert to database
$users = array(
    array('username' => 'user1',
        'password' => 'User1',
        'validity' => 1,
        'role' => 0),
    array('username' => 'user2',
        'password' => 'User2',
        'validity' => 1,
        'role' => 0),
    array('username' => 'admin1',
        'password' => 'Admin1',
        'validity' => 1,
        'role' => 0)
);

echo "3" . "<br/>";

/*foreach ($users as $u) {
    $file_db->exec("INSERT INTO User (username, password, validty, role)
                    VALUES ('{$u['username']}', '{$u['password']}', '{$u['validty']}', '{$u['role']}')");
}*/

echo "4" . "<br/>";

$result =  $file_db->query('SELECT * FROM User');

echo "5" . "<br/>";

foreach($result as $row) {
    echo "Username: " . $row['username'] . "<br/>";
    echo "Password: " . $row['password'] . "<br/>";
    echo "Validity: " . $row['validty'] . "<br/>";
    echo "Role: " . $row['role'] . "<br/>";
    echo "<br/>";
}

echo "6" . "<br/>";

// Close file db connection
$file_db = null;

echo "7" . "<br/>";

?>