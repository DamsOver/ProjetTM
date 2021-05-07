<?php
include("php/config.php");
$topic = $_GET['gTopic'];
$req1 = $conn->prepare("select commentaire.texte,commentaire.dateajoutcom,utilisateur.pseudo from commentaire left join topic using(idtopic) left join utilisateur on commentaire.mailcom=utilisateur.mail where nomtopic ='$topic' order by dateajoutcom");
$req1 -> execute();

$select = '';

if($req1 -> rowCount() > 0){
    while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
        $TxtComTmp = $data1['texte'];
        $DateComTmp = $data1['dateajoutcom'];
        $PseudoUtilTmp = $data1['pseudo'];

        $select .= '
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3><div class ="pl-3 pt-1 pr-3">'.$PseudoUtilTmp .'</div></h3>
                            </div>
                            <div class="card-text">
                                
                                <div class ="pl-3 pt-1 pr-3" style="background-color: grey;">'.$TxtComTmp .'</div>
                                <footer class="blockquote-footer">
                                <div class ="pl-3 pt-1 pr-3">'.$DateComTmp .'</div>
                                </footer>
                                <a>like ton martin</a>
                            </div>
                        </div>
                    </div>';
    }
}
echo $select;
$conn = null;
?>
