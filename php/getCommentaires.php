<?php
include("php/config.php");
$topic = $_GET['gTopic'];
$req1 = $conn->prepare("select texte from commentaire left join topic using(idtopic) where nomtopic ='$topic'");
$req1 -> execute();

$select = '';

if($req1 -> rowCount() > 0){
    while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
        $nomComTmp = $data1['texte'];
        $select .= '<div class="single-comment">
                <div class="row">
                    <div class="col-2">
                        <div class ="pl-3 pt-1 pr-3">user</div>
                        <div class ="pl-3 pt-1 pr-3">profil Picture</div>
                    </div>
                    <div class="col-10">
                        <div class ="pl-3 pt-1 pr-3">date</div>
                        <div class ="pl-3 pt-1 pr-3">'.$nomComTmp .'</div>
                        <div></br></div>
                    </div>
                </div>
            </div>';
    }
}
echo $select;
$conn = null;
?>
