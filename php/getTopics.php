<?php
    include("php/config.php");
    $theme = $_GET['gTheme'];
    $req1 = $conn->prepare("select nomtopic from topic where nomtheme ='$theme'");
    $req1 -> execute();

    $select = '<div class=\"container\">';

    if($req1 -> rowCount() > 0){
        while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
            $nomTopicTmp = $data1['nomtopic'];
            $select .= "<div class='row'>
                            <div class='col'>
                                <a href='#\'>" . $nomTopicTmp . "</a>
                            </div>
                        </div>";
        }
    }
    $select .= "</div>";
    echo $select;
    $conn = null;
?>