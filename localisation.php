<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">
        <title>Topics</title>
        <style type="text/css">
            /* Set the size of the div element that contains the map */
            #map {
                height: 400px;
                /* The height is 400 pixels */
                width: 100%;
                /* The width is the width of the web page */
            }
        </style>
    </head>
    <body>
        <?php
            include("php/navbar.php");
        ?>

        <div class="container">
            <p>Appuyez sur le bouton pour plus d'informations sur votre lieu actuel</p>

            <button onclick="getLocation()">Localisation</button>

            <p id="localisation"></p>
            <div id="map"></div>

            <script src="js/localisation.js" crossorigin="anonymous"></script>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="js/goTopic.js" crossorigin="anonymous"></script>
    </body>
</html>
