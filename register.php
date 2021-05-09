<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/topic.css">
        <title>Register</title>
    </head>
    <body>
        <?php
            include("php/navbar.php");
        ?>

        <?php
            require('php/config.php');
            if (isset($_REQUEST['user'], $_REQUEST['mail'], $_REQUEST['password'])) {
                // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
                $email = stripslashes($_REQUEST['mail']);
                $requeteVerif = $conn -> prepare("select * from utilisateur where mail='$email'");
                $requeteVerif -> execute();
                if($requeteVerif -> rowCount() == 0) {
                    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
                    $username = strip_tags($_REQUEST['user']);
                    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
                    $password = strip_tags($_REQUEST['password']);
                    $passwordCheck = strip_tags($_REQUEST['passwordCheck']);

                    $inscrire = true;
                    $erreurMotDePasse = false;
                    $regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                    /* ^[^0-9][_a-z0-9-]+ : l'adresse mail ne peut pas commencer par un chiffre, mais peut contenir
                                            des minusclues, majuscules, tiret et underscores. Il y aura au moins un caractère.
                     * (\.[_a-z0-9-]+)*@ : l'adresse mail peut contenir 2 ou + parties séparées par un point avant l'arobase.
                                            l'arobase est obligatoire.
                     * [a-z0-9-]+ : le domaine peut contenir des minuscules, chiffres et tirets. Le domaine contient au moins
                                      un caractère.
                     * (\.[a-z0-9-]+)* : le domaine peut contenir 2 ou + parties séparées par un point.
                     * (\.[a-z]{2,3})$ : l'adresse mail se termine par un poit obligatoire, et 2 à 3 lettres minuscules
                     * */
                    if(!preg_match($regex, $email)) {
                        $inscrire = false;
                    } else if($password != $passwordCheck) {
                        $inscrire = false;
                        $erreurMotDePasse = true;
                    }

                    if($inscrire) {
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $passwordCheck = password_hash($passwordCheck, PASSWORD_DEFAULT);

                        $grade = '1';

                        //requéte SQL + mot de passe crypté
                        $requete = $conn->prepare("INSERT into `utilisateur` (pseudo, mail, motDePasse, role)
                                                            VALUES (:username, :email, :password, :grade)");

                        $requete -> bindValue(':username', $username, PDO::PARAM_STR);
                        $requete -> bindValue(':email', $email, PDO::PARAM_STR);
                        $requete -> bindValue(':password', $password, PDO::PARAM_STR);
                        $requete -> bindValue(':grade', $grade, PDO::PARAM_STR);

                        $requete -> execute();

                        if($conn != null){
                            echo "<div class='success'>
                                <h3>Vous êtes inscrit avec succès.</h3>
                                <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                              </div>";
                        } else {
                            echo "<script>
                                 alert(\"Problème de connexion avec la bdd\");
                                 window.location.href = 'register.php';
                              </script>";
                        }
                    } else {
                        if($erreurMotDePasse) {
                            echo "<script>
                                alert(\"Les mots de passent doivent correspondre.\");
                                window.location.href = 'register.php';
                              </script>";
                        } else {
                            echo "<script>
                                alert(\"Veuillez entrer une adresse mail valide.\");
                                window.location.href = 'register.php';
                              </script>";
                        }
                    }
                } else {
                    echo "<p>Vous êtes déjà inscrit.</p>";
                }
            } else {
        ?>
                <form class="box" action="" method="post">
                    <h1>Inscription</h1>
                    <input type="text" name="user" placeholder="Nom d'utilisateur" required>
                    <input type="text" name="mail" placeholder="Adresse e-mail" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <input type="password" name="passwordCheck" placeholder="Confirmer le mot de passe" required>
                    <input type="submit" name="send" value="S'inscrire">
                </form>
        <?php } ?>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

        <script src="js/goTopic.js" crossorigin="anonymous"></script>
    </body>
</html>