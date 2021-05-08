<?php
    session_start();
?>

<?php
    require('php/config.php');
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
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">

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
                <div class ="comments">
                    <?php
                        include("php/getCommentaires.php");
                    ?>
                </div>
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
                    <textarea name="nTextArea" class="form-control" id="InputTextTopic" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

        <script src="js/goTopic.js" crossorigin="anonymous"></script>
        <script src="js/goCommentaire.js" crossorigin="anonymous"></script>
    </body>
</html>