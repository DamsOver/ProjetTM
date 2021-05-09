<?php
    session_start();
    include "config.php";
    $vTmpTheme = $_POST['tmpTheme'];

    $requete = $conn -> prepare("delete from theme where nomtheme = :vTmpTheme;");

    $requete -> bindValue(':vTmpTheme', $vTmpTheme, PDO::PARAM_STR);
    $requete -> execute();
?>