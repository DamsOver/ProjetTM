<?php
include("php/config.php");
$req1 = $conn->prepare("select * from theme");
$req1 -> execute();

$select = '';

if($req1 -> rowCount() > 0){
    while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
        $ThemeTmp = $data1['nomtheme'];

        $select .= '<li class="list-group-item">' .$ThemeTmp .'
                <form method ="post" class="form-check-inline" style="float:right;">
                    <button style="float:right;" name="suppr" value='.$ThemeTmp.'> supprimer </button>
                </form>
                </li>';
    }
}

if (isset($_POST['suppr'])) {
    $ThemeASup = $_POST['suppr'];
    $req1 = $conn->prepare("delete from theme where nomtheme = '$ThemeASup'");
    $req1 -> execute();
    header("Location: displayAdmin.php");
}

echo $select;
$conn = null;
?>
