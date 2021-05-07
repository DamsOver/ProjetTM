<?php
    include("php/config.php");

    $req1 = $conn -> prepare("select * from categorie");
    $req1 -> execute();

    $select = '';

    if($req1 -> rowCount()>0){
        while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
            $nomCatTmp = $data1['nomcat'];
            $req2 = $conn->prepare("select nomtheme from theme where nomcat = '$nomCatTmp'");
            $req2 -> execute();
            $select .=   '<li class="nav-item dropdown"><a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">' . $nomCatTmp . '</a><ul class="dropdown-menu">';
            if($req2 -> rowCount() > 0) {
                while($data2 = $req2 -> fetch(PDO::FETCH_ASSOC)) {
                    $nomThemeTmp = $data2['nomtheme'];
                    $select .= '<li><a class="dropdown-item" href="#">' . $nomThemeTmp . '</a></li>';
                }
            }
            $select .= '</ul></li>';
        }
    }

    echo $select;
    $conn = null;
?>