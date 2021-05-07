<?php
include("php/config.php");
$req1 = $conn->prepare("select * from theme");
$req1 -> execute();

$select = '';

if($req1 -> rowCount() > 0){
    while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
        $ThemeTmp = $data1['nomtheme'];
        $select .= '<li class="list-group-item">' .$ThemeTmp .'<button style="float:right;" href="index.php" > supprimer </button></li>';
    }
}
echo $select;
$conn = null;
?>
