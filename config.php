<?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'programmer_bdd');

    // Connexion à la base de données MySQL
    $conn = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);

    // Vérifier la connexion

?>