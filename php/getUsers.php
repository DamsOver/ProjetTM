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
                    <button style="float:right;" name="suppr" value='.$MailTmp.'> supprimer </button>
                </form>
            </li>';
    }
}

if (isset($_POST['suppr'])) {
    $mailASup = $_POST['suppr'];
    $req1 = $conn->prepare("delete from utilisateur where mail = '$mailASup'");
    $req1 -> execute();
    header("Location: displayAdmin.php");
}


echo $select;
$conn = null;
?>