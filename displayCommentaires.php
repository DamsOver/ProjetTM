<?php
    session_start();
?>

<?php
    /*require('php/config.php');
    if (isset($_REQUEST['nTextArea'])) {
        if(isset($_SESSION['mail'])) {
            $vTextArea = stripslashes($_REQUEST['nTextArea']);
            if($vTextArea != "") {
                $vMail = $_SESSION['mail'];
                $vIdTopic = $_GET['gIdTopic'];

                //requéte SQL + mot de passe crypté
                $requete = $conn->prepare("INSERT into `commentaire` (texte, dateajoutcom, mailCom, idtopic)
                                            VALUES (:vTextArea, now(), :vMail, :vIdTopic)");

                $requete -> bindValue(':vTextArea', $vTextArea, PDO::PARAM_STR);
                $requete -> bindValue(':vMail', $vMail, PDO::PARAM_STR);
                $requete -> bindValue(':vIdTopic', $vIdTopic, PDO::PARAM_INT);

                $requete -> execute();

                $vTextArea = "";
            }
        } else {
            echo "<script>
                      alert(\"Vous devez être connecté pour pouvoir répondre à une conversation.\");
                      window.location.href = 'login.php';
                  </script>";
        }
    }*/

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/topic.css">
        <link rel="stylesheet" type="text/css" href="css/commentaires.css">
        <script type="text/javascript" src="js/index.js"></script>
        <title></title>
    </head>
    <body>
        <?php
            include("php/navbar.php");
        ?>

        <section id ="mainSection">
            <div class ="grid-wrapper">
                <div class="titre h2 ml-1 pt-4 pl-4 pr-4">
                    <?php
                        echo $_GET['gTopic'];
                    ?>
                </div>
                <div class ="comments" id="comsCom"></div>
                <div class="new-comment">
                    <div class="titre h4 ml-1 pt-4 pl-4 pr-4">
                        Votre commentaire :
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="InputTextTopic" style="color:white;">Repondre :</label>
                    <textarea name="nTextArea" class="form-control" id="InputTextCom" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-primary" id="butSubmitCom">Submit</button>
            </form>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

        <script src="js/goTopic.js" crossorigin="anonymous"></script>
        <script src="js/goCommentaire.js" crossorigin="anonymous"></script>

        <script>
        $(document).ready(function() {
            // Search url variable
            let queryString = window.location.search;
            let urlParams = new URLSearchParams(queryString);
            let vIdTopic = urlParams.get('gIdTopic');
            let vTopic = urlParams.get('gTopic');
            $.ajax({
                url: "php/getCommentaires.php",
                type: "POST",
                data: {
                    idTopic: vIdTopic,
                    topic:vTopic
                },
                cache: false,
                success: function(dataResult2){
                    console.log(dataResult2);
                    /*var dataResult2 = JSON.parse(dataResult2);*/
                    $('#comsCom').html(dataResult2);
                }
            });

            $('#butSubmitCom').on('click', function() {
                let vTextCom = $('#InputTextCom').val();


                if(vTextCom!="" && vIdTopic!=""){
                    $.ajax({
                        url: "php/saveCom.php",
                        type: "POST",
                        data: {
                            textCom: vTextCom,
                            idTopic: vIdTopic
                        },
                        cache: false,
                        success: function(dataResult){
                            $.ajax({
                                url: "php/getCommentaires.php",
                                type: "POST",
                                data: {
                                    idTopic: vIdTopic,
                                    topic:vTopic
                                },
                                cache: false,
                                success: function(dataResult2){
                                    console.log(dataResult2);
                                    /*var dataResult2 = JSON.parse(dataResult2);*/
                                    $('#comsCom').html(dataResult2);
                                }
                            });
                        }
                    });

                }
                else{
                    alert('Please fill all the field !');
                }
            });
        });
        </script>
    </body>
</html>