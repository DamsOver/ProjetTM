<?php
    include("php/config.php");
    $topic = $_GET['gTopic'];
    $req1 = $conn -> prepare("select commentaire.texte, commentaire.dateajoutcom, utilisateur.pseudo, commentaire.idcom 
                                    from commentaire left join topic using(idtopic) left join utilisateur 
                                    on commentaire.mailcom=utilisateur.mail where nomtopic ='$topic' order by dateajoutcom");
    $req1 -> execute();

    $select = '';

    if($req1 -> rowCount() > 0){
        while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
            $TxtComTmp = $data1['texte'];
            $DateComTmp = $data1['dateajoutcom'];
            $PseudoUtilTmp = $data1['pseudo'];
            $IdCom = $data1['idcom'];
            $NbLikes = 0;

            $req2 = $conn -> prepare("select commentaire.idcom, count(*) from commentaire left join likecom using(idcom) group by idcom");
            $req2 -> execute();

            while($data2 = $req2 -> fetch(PDO::FETCH_ASSOC)) {
                if($data2['idcom'] == $data1['idcom']) {
                    $NbLikes = $data2['count(*)'];
                    break;
                }
            }

            $select .= '<div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3><div class ="pl-3 pt-1 pr-3">' . $PseudoUtilTmp .'</div></h3>
                                </div>
                                <div class="card-text">
                                    <div class ="pl-3 pt-1 pr-3">' . $TxtComTmp .'</div>
                                    <footer class="blockquote-footer">
                                        <div class ="pl-3 pt-1 pr-3">' . $DateComTmp .'</div>
                                    </footer>
                                    <a href="php/like.php?id=' . $IdCom . '&topic=' . $_GET['gTopic'] . '">Likes ' . $NbLikes . '</a>
                                </div>
                            </div>
                        </div>';
        }
    }
    echo $select;
    $conn = null;
?>
