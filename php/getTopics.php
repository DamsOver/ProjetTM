<?php
    include("config.php");
    $theme = $_GET['gTheme'];
    $req1 = $conn->prepare("select idtopic, nomtopic, dateajoutTopic from topic where nomtheme ='$theme'");
    $req1 -> execute();

    echo "<h1>$theme</h1>";
    $select = '<div  class="row" style="margin-top: 20px;">';

    if($req1 -> rowCount() > 0){
        while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
            $NomTopic = $data1['nomtopic'];
            $DateAjoutTopic = $data1['dateajoutTopic'];
            $IdTopic = $data1['idtopic'];
            $select .= "<div class='col-12 col-md-6'>
                            <div class='card'>
                                <div class='card-body'>
                                    <p class='card-title'>Topic ouvert le : " . $DateAjoutTopic . "</p>
                                    <a href='#' id='$IdTopic'>" . $NomTopic . "</a>
                                    <form  method ='post' class='form-check-inline' style='float:right;'>
                                        <button style='float:right;' name='supprimerTopic' value=' . $IdTopic . '> Supprimer </button>
                                    </form>
                                </div>
                            </div>
                        </div>";
        }
    }
    $select .= "</div>";

    if(isset($_POST['supprimerTopic'])) {
        $IdTopic = $_POST['supprimerTopic'];
        if($_SESSION['grade'] >= 2) {
            $req2 = $conn -> prepare("delete from topic where idtopic = '$IdTopic'");
            $req2 -> execute();
        } else {
            echo "<script>
                      alert(\"Vous n'êtes pas autorisé à supprimer ce topic.\");
                  </script>";
        }
        header("Location: displayTopics.php?gTheme=" . $theme);
    }
    echo $select;
    $conn = null;
?>
