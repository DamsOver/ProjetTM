<?php

    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script type="text/javascript" src="js/index.js"></script>
        <title>Accueil</title>
    </head>
    <body>

        <?php
            include("php/navbar.php");
        ?>

        <h1 style="color:white;">Bienvenue sur pro-g(r)ammer !</h1>
        <h2 style="color:white;">Tu es Dev ? Ou bien Gamer ? Ce forum est TON forum ! </h2>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function(){

            $.ajax({
                url: 'php/getCategories.php',
                dataType:'json',

                success:function(response){
                    ajax.parseJSON(response);
                }
            });

        });

        let ajax = {
            parseJSON:function(response) {
                for (let i = 0; i < response.length; i++) {
                    $('#elts_cat').append("<li>"+ response[i].id +"</li>");
                }
            }
        }

    </script>
    </body>
</html>