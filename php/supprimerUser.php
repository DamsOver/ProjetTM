<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    include("config.php");
    $vTmpUserMail = $_POST['tmpUserMail'];

    $requete = $conn -> prepare("delete from utilisateur where mail = :vTmpUserMail;");

    $requete -> bindValue(':vTmpUserMail', $vTmpUserMail, PDO::PARAM_STR);
    $requete -> execute();
?>
