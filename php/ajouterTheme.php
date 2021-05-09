<?php

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    include("config.php");

    $theme = $_POST["tmpTheme"];
    $categorie = $_POST["tmpCategorie"];
    $mail = $_SESSION['mail'];

    // Ajoute un theme dans la bdd
    $reqAjoutTheme = $conn -> prepare("INSERT into theme(nomtheme, mailTheme, nomcat)
            VALUES ('$theme','$mail','$categorie')");

    $reqAjoutTheme -> execute();
?>
