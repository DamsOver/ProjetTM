<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

	include("config.php");
	$vTitreTopic = strip_tags($_REQUEST['nomTopic']);
	$vTextArea = strip_tags($_REQUEST['textTopic']);
	$vTheme = $_POST['theme'];
	$vMail = $_SESSION['mail'];

    $requete = $conn -> prepare("INSERT into `topic` (nomtopic, mailTopic, nomtheme, dateajoutTopic)
    VALUES (:vTitreTopic, :vMail, :vTheme, now())");

    //Topic
    $requete -> bindValue(':vTitreTopic', $vTitreTopic, PDO::PARAM_STR);
    $requete -> bindValue(':vMail', $vMail, PDO::PARAM_STR);
    $requete -> bindValue(':vTheme', $vTheme, PDO::PARAM_STR);
    $requete -> execute();
    $idTmp = $conn -> lastInsertId();

    $requete2 = $conn -> prepare("INSERT into `commentaire` (texte, dateajoutcom, mailCom, idtopic)
    VALUES (:vTextArea, now(), :vMail, :idTmp)");

    //Commentaire
    $requete2 -> bindValue(':vTextArea', $vTextArea, PDO::PARAM_STR);
    $requete2 -> bindValue(':vMail', $vMail, PDO::PARAM_STR);
    $requete2 -> bindValue(':idTmp', $idTmp, PDO::PARAM_INT);
    $requete2 -> execute();

?>