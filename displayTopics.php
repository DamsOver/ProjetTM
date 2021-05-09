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
        <link rel="stylesheet" type="text/css" href="css/topic.css">
        <link rel="stylesheet" type="text/css" href="css/commentaires.css">
        <script type="text/javascript" src="js/index.js"></script>
        <title>Topics</title>
    </head>
    <body>
        <?php
            include("php/navbar.php");
        ?>

        <section id ="mainSection">
            <div class ="grid-wrapper">
                <div class ="comments" id="coms"></div>

                <div class="new-comment">
                    <div class="titre h4 ml-1 pt-4 pl-4 pr-4">Votre Topic :<span id="topicAjoute" style="background-color:#2abf52;color: white;padding: 5px;margin-left: 10px;border-radius: 10px;display:none;">Topic ajouté</span></div>
                </div>
            </div>
        </section>

        <div class="container">
            <form id="fupForm" action="" method="post">
                <div class="form-group">
                    <label for="InputNomTopic" style="color:white;">Nom du topic</label>
                    <input type="text" name="nTitreTopic" class="form-control" id="InputNomTopic" placeholder="Nom du topic">
                </div>
                <div class="form-group">
                    <label for="InputTextTopic" style="color:white;">Commentaire</label>
                    <textarea class="form-control" name="nTextArea" id="InputTextTopic" rows="3"> </textarea>
                </div>
                <button type="button" class="btn btn-primary" id="butSubmitTopic">Submit</button>
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
                let vTheme = urlParams.get('gTheme');
             $.ajax({
                 url: "php/getTopics.php",
                    type: "POST",
                    data: {
                        theme: vTheme
                    },
                    cache: false,
                    success: function(dataResult2){
                        $('#coms').html(dataResult2);
                    }
                });
            $('#butSubmitTopic').on('click', function() {
                let vNomTopic = $('#InputNomTopic').val();
                let vTextTopic = $('#InputTextTopic').val();
                if(vNomTopic!="" && vTextTopic!="" && vTheme!=""){
                    $.ajax({
                        url: "php/saveTopic.php",
                        type: "POST",
                        data: {
                            nomTopic: vNomTopic,
                            textTopic: vTextTopic,
                            theme: vTheme
                        },
                        cache: false,
                        success: function(dataResult){
                            $.ajax({
                                url: "php/getTopics.php",
                                type: "POST",
                                data: {
                                    theme: vTheme
                                },
                                cache: false,
                                success: function(dataResult2){
                                    console.log(dataResult2);
                                    /*var dataResult2 = JSON.parse(dataResult2);*/
                                    $('#coms').html(dataResult2);
                                    $("#topicAjoute").show();
                                    setTimeout(function() { $("#topicAjoute").hide(); }, 5000);
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