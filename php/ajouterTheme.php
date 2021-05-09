<?php

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    include("config.php");

    $theme = $_POST["tmpTheme"];
    $categorie = $_POST["tmpCategorie"];
    $mail = $_SESSION['mail'];

    /*$reqAjoutTheme = $conn -> prepare("INSERT into `theme` (nomtheme, mailTheme, nomcat)
            VALUES (:theme,:mail,:categorie)");*/
    $reqAjoutTheme = $conn -> prepare("INSERT into theme(nomtheme, mailTheme, nomcat)
            VALUES ('$theme','$mail','$categorie')");

    $reqAjoutTheme -> execute();
?>
