<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script type="text/javascript" src="js/index.js"></script>
        <title>Register</title>
    </head>
    <body>
        <?php
            include("php/navbar.php");
        ?>

        <?php
            require('php/config.php');
            if (isset($_REQUEST['user'], $_REQUEST['mail'], $_REQUEST['password'])) {
                // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
                $username = stripslashes($_REQUEST['user']);
                // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
                $email = stripslashes($_REQUEST['mail']);
                // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
                $password = stripslashes($_REQUEST['password']);
                $password = password_hash($password, PASSWORD_DEFAULT);

                $grade = '1';

                //requéte SQL + mot de passe crypté
                $requete = $conn->prepare("INSERT into `utilisateur` (pseudo, mail, motDePasse, role)
                VALUES (:username, :email, :password, :grade)");

                $requete -> bindValue(':username', $username, PDO::PARAM_STR);
                $requete -> bindValue(':email', $email, PDO::PARAM_STR);
                $requete -> bindValue(':password', $password, PDO::PARAM_STR);
                $requete -> bindValue(':grade', $grade, PDO::PARAM_STR);

                $requete->execute();

                if($conn != null){
                    echo "<div class='success'>
                            <h3>Vous êtes inscrit avec succès.</h3>
                            <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                            </div>";
                }
            } else {
        ?>

        <form class="box" action="" method="post">
            <h1>Inscription</h1>
            <input type="text" name="user" placeholder="Nom d'utilisateur">
            <input type="text" name="mail" placeholder="Adresse e-mail">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="password" name="passwordCheck" placeholder="Confirmer le mot de passe">
            <input type="submit" name="send" value="S'inscrire">
        </form>

        <form action="topic.php">
            <input type="submit" value="test affichage topic" />
        </form>

        <?php } ?>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

        <script src="js/goTopic.js" crossorigin="anonymous"></script>
    </body>
</html>