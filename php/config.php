<?php

    // Config pour 000webhost
    /*if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');
    if (!defined('DB_USERNAME')) define('DB_USERNAME', 'id16658863_root');
    if (!defined('DB_PASSWORD')) define('DB_PASSWORD', '@Helha2020Helha');
    if (!defined('DB_NAME')) define('DB_NAME', 'id16658863_programmer_bdd');*/

    // Config local
    if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');
    if (!defined('DB_USERNAME')) define('DB_USERNAME', 'root');
    if (!defined('DB_PASSWORD')) define('DB_PASSWORD', '');
    if (!defined('DB_NAME')) define('DB_NAME', 'programmer_bdd');

    // Connexion à la base de données MySQL
    try {
        $conn = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } catch(PDOException $e) {
        echo "Connection failed:".$e->getMessage();
    }

?>