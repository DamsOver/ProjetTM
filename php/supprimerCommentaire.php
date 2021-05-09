<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    include("config.php");
    $IdCom = $_POST['idCom'];

    $req1 = $conn->prepare("delete from commentaire where idcom = '$IdCom'");
    $req1 -> execute();

?>