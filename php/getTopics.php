<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/topic.css">
        <script type="text/javascript" src="js/index.js"></script>
        <title></title>
    </head>
    <body>
        <?php
            include("php/config.php");
            $theme = $_GET['gTheme'];
            $req1 = $conn->prepare("select nomtopic from topic where nomtheme ='$theme'");
            $req1 -> execute();

            $select = '<div  class="row">';

            if($req1 -> rowCount() > 0){
                while($data1 = $req1 -> fetch(PDO::FETCH_ASSOC)){
                    $nomTopicTmp = $data1['nomtopic'];
                    $select .= "
                                        <div class='col'>
                                            <div class='card'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>Topic : " . $nomTopicTmp . "</h5>
                                                    <a href='#' class='stretched-link'>" . $nomTopicTmp . "</a>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                }
            }
            $select .= "</div>";
            echo $select;
            $conn = null;
        ?>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>
