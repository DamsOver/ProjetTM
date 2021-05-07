<?php
include("php/config.php");
$req1 = $conn->prepare("select * from utilisateur");
$req1 -> execute();

$select = '';

if($req1 -> rowCount() > 0){
    while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
        $PseudoTmp = $data1['pseudo'];
        $select .= '<li class="list-group-item">' .$PseudoTmp .'<button style="float:right;" href="index.php" > supprimer </button></li>';
    }
}
echo $select;
$conn = null;
?>