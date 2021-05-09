<?php
    if(session_status()===PHP_SESSION_NONE){
        session_start();
    }

    include("config.php");

    $id = $_POST['idCom'];
    $mail = $_POST['mail'];
    $NbLikes = 0;

    $req2 = $conn -> prepare("select commentaire.idcom, count(*) from commentaire join likecom using(idcom) group by idcom");
    $req2 -> execute();
    if($req2 -> rowCount() > 0) {
        while($data2 = $req2 -> fetch(PDO::FETCH_ASSOC)) {
            if($data2['idcom'] == $id) {
                $NbLikes = $data2['count(*)'];
                break;
            }
        }
    }

    echo $NbLikes;

?>
