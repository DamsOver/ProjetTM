<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="js/index.js"></script>
    <title></title>
</head>
<body>

    <?php
      include("php/navbar.php");
    ?>

    <?php
        require('config.php');
        session_start();

        if (isset($_POST['user'])){
            $username = stripslashes($_REQUEST['user']);
            $password = stripslashes($_REQUEST['password']);


            $requete2 = $conn->prepare("SELECT * FROM utilisateur");
            $requete2->bindValue(':username', $username, PDO::PARAM_STR);
            $requete2->execute();
            $test = false;

            while ($elt = $requete2->fetch()) {
                if($elt['pseudo']==$username && password_verify($_POST["password"], $elt['motDePasse'])) {
                   echo $elt['pseudo'] . ' : OK !';
                   $_SESSION['username'] = $username;
                    $test = true;
                }

            }

		$requete2->closeCursor();

            if($test==true){
                header("Location: index.php");
            }else{
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        }
    ?>

    <form class="box" action="" method="post">
    <h1>Login</h1>
    <input type="text" name="user" placeholder="Nom d'utilisateur">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="submit" name="send" value="Login">
    </form>

    <?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
    <?php } ?>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>