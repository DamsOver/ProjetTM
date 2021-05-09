<?php
    include("php/config.php");
    $topic = $_GET['gTopic'];
    $req1 = $conn->prepare("select commentaire.texte,commentaire.dateajout,utilisateur.pseudo from commentaire where nomtopic ='$topic' order by dateajout");
    $req1 -> execute();

    $select = '';

    if($req1 -> rowCount() > 0){
        while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
            $TxtComTmp = $data1['texte'];
            $DateComTmp = $data1['dateajout'];
            $PseudoUtilTmp = $data1['pseudo'];

            $select .= '<div class="single-comment">
                    <div class="row">
                        <div class="col-2">
                            <div class ="pl-3 pt-1 pr-3">'.$PseudoUtilTmp .'</div>
                            <div class ="pl-3 pt-1 pr-3">profil Picture</div>
                        </div>
                        <div class="col-10">
                            <div class ="pl-3 pt-1 pr-3">'.$DateComTmp .'</div>
                            <div class ="pl-3 pt-1 pr-3">'.$TxtComTmp .'</div>
                            <div></br></div>
                        </div>
                    </div>
                </div>';
        }
    }
    echo $select;
    $conn = null;
?>
