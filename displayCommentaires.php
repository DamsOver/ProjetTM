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
<?php
require('php/config.php');
session_start();
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
        <div class="editor" contenteditable>
            <h1>Simple Html editor</h1>
            <p>Good to start</p>
        </div>
    </div>
</section>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script src="js/goTopic.js" crossorigin="anonymous"></script>
    <script src="js/goCommentaire.js" crossorigin="anonymous"></script>
</body>
</html>