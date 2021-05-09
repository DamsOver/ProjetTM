<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
?>

<?php
    include("config.php");
    $theme = $_POST['theme'];
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
                                    
                                ";

            if(isset($_SESSION['grade'])){
                if($_SESSION['grade'] >= 2) {
                    $select .= "<form  method ='post' class='form-check-inline' style='float:right;'>
                                        <button type='button' id='btnDelTopic' style='float:right;' name='supprimerTopic' value='$IdTopic'> Supprimer </button>
                                    </form>          
                                ";
                }
            }

            $select .= "</div>
                            </div>
                        </div>            
            ";

        }
    }
    $select .= "</div>";

    echo $select;
    $conn = null;
?>
