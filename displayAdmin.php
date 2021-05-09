<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
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
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <title>Topics</title>
    </head>
    <body>
        <?php
            include("php/navbar.php");
        ?>

        <?php
            include("php/adminTitreListe.php");
        ?>

        <?php
            include("php/getUsers.php");
        ?>

        <div class="col-6 pb-4" id="MainListGroupTheme">
        <?php
            include("php/getThemes.php");
        ?>
        <div class="container.fluid" id = themeUser>
            <div class="row">
                <div class="col-6" style="color:white;"></div>
                <div class="col-6 pt-04 pb-4" style="color:white;">
                    <?php
                        include("php/getCatAdmin.php");
                    ?>
                </div>
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="js/goTopic.js" crossorigin="anonymous"></script>
        <script src="js/ajaxAdmin.js" crossorigin="anonymous"></script>
    </body>
</html>