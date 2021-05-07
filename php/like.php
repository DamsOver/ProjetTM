<?php
    session_start();

    include("config.php");
    $id = (int) $_GET['id'];
    $topic = $_GET['topic'];
    $mail = $_SESSION['mail'];

    $requeteVerif = $conn -> prepare("select * from likecom where mailLike = '$mail' and idcom = '$id'");
    $requeteVerif -> execute();
    if($requeteVerif -> rowCount() == 0) {
        $requeteAjout = $conn -> prepare("insert into likecom(mailLike, idcom) values (:mail, :id)");
        $requeteAjout -> bindValue(':mail', $mail, PDO::PARAM_STR);
        $requeteAjout -> bindValue(':id', $id, PDO::PARAM_INT);
        $requeteAjout -> execute();
    } else {
        $requeteSuppression = $conn -> prepare("delete from likecom where mailLike = '$mail' and idcom = '$id'");
        $requeteSuppression -> execute();
    }

    header("Location: ../displayCommentaires.php?gTopic=" . $topic);
?>
