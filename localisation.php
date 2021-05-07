<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">
        <script type="text/javascript" src="js/index.js"></script>
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

            <script>
                var x = document.getElementById("localisation");

                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        x.innerHTML = "La géolocalisation n'est pas supportée par cet explorateur";
                    }
                }

                function showPosition(position) {
                    x.innerHTML = "Latitude: " + position.coords.latitude +
                        "<br>Longitude: " + position.coords.longitude;
                    initMap(position.coords.latitude, position.coords.longitude);
                }
            </script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtG3XAaoPu48iDIqTvOrW14K7jQtss9Co&callback=initMap&libraries=&v=weekly"
                async
            ></script>
            <script>
                // Initialize and add the map
                function initMap(latitude, longitude) {
                    // The location of Uluru
                    if(latitude == undefined || longitude == undefined){
                        latitude = 0;
                        longitude = 0;
                    }
                    const point = { lat: latitude, lng: longitude };
                    // The map, centered at Uluru
                    const map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 4,
                        center: point,
                    });
                    // The marker, positioned at Uluru
                    const marker = new google.maps.Marker({
                        position: point,
                        map: map,
                    });
                }
            </script>

        </div>



        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

        <script src="js/goTopic.js" crossorigin="anonymous"></script>
    </body>
</html>
