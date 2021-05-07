<?php
    include("php/config.php");
    $theme = $_GET['gTheme'];
    $req1 = $conn->prepare("select nomtopic from topic where nomtheme ='$theme'");
    $req1 -> execute();

    $select = '<div  class="row" style="margin-top: 20px;">';

    if($req1 -> rowCount() > 0){
        while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
            $nomTopicTmp = $data1['nomtopic'];
            $select .= "<div class='col-12 col-md-6'>
                            <div class='card'>
                                <div class='card-body'>
                                    <p class='card-title'>Topic : " . $nomTopicTmp . "</p>
                                    <a href='#' class='stretched-link'>" . $nomTopicTmp . "</a>
                                </div>
                            </div>
                        </div>";
        }
    }
    $select .= "</div>";
    echo $select;
    $conn = null;
?>
