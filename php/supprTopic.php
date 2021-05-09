<?php
    session_start();
    include "config.php";
    $IdTopic=$_POST['idTopic'];
    echo $IdTopic;
    $req1 = $conn->prepare("delete from topic where idtopic = '$IdTopic'");
    $req1 -> execute();

?>