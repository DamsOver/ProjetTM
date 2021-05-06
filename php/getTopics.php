<?php
    include("php/config.php");
    $theme = $_GET['gTheme'];
    $req1 = $conn->prepare("select nomtopic from topic where nomtheme ='$theme'");
    $req1 -> execute();

    $select = '<ul  class="list-group">';

    if($req1 -> rowCount() > 0){
        while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
            $nomTopicTmp = $data1['nomtopic'];
            $select .= "
                            <li class='list-group-item'>
                                <a href='#\'>" . $nomTopicTmp . "</a>
                            </li>
                        ";
        }
    }
    $select .= "</ul>";
    echo $select;
    $conn = null;
?>