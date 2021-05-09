<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    include "config.php";
    $vMailUser=$_POST['mailUser'];
    $vRole=$_POST['role'];

    if($vRole == 'Utilisateur') {
        $vRole = 1;
    } elseif($vRole == 'Modérateur') {
        $vRole = 2;
    } else{
        $vRole = 3;
    }

    $requete = $conn->prepare("update utilisateur set role =:vRole where mail = :vMailUser;");

    $requete -> bindValue(':vRole', $vRole, PDO::PARAM_INT);
    $requete -> bindValue(':vMailUser', $vMailUser, PDO::PARAM_STR);
    $requete -> execute();
?>
