<?php
include("php/config.php");
$mail = $_SESSION['mail'];
$req1 = $conn->prepare("select * from utilisateur where mail != '$mail'");
$req1 -> execute();

$select = '';

if($req1 -> rowCount() > 0){
    while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
        $PseudoTmp = $data1['pseudo'];
        $MailTmp = $data1['mail'];
        $select .= '<li class="list-group-item">' .$PseudoTmp .'</br>'.$MailTmp .'
                <form method ="post" class="form-check-inline" style="float:right;">
                    <button style="float:right;" name="suppr" value="salut"> supprimer </button>
                </form>
            </li>';
    }
}

if (isset($_POST['suppr'])) {
    echo ($_POST['suppr']);
}


echo $select;
$conn = null;
?>