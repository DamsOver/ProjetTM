<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/index.css">

        <link rel="stylesheet" type="text/css" href="css/topic.css">

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
        ?>
        <section id ="mainSection">
            <div class ="grid-wrapper">
                <div class="titre h2 ml-1 pt-4 pl-4 pr-4">
                    Titre du topic bla bla bla bla bla
                </div>
                <nav aria-label="navigation">
                    <ul class="pagination pl-4 ml-1">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
                <div class ="comments">
                    <div class="single-comment">
                        <div class="row">
                            <div class="col-2">
                                <div class ="pl-3 pt-1 pr-3">user</div>
                                <div class ="pl-3 pt-1 pr-3">profil Picture</div>
                            </div>
                            <div class="col-10">
                                <div class ="pl-3 pt-1 pr-3">date</div>
                                <div class ="pl-3 pt-1 pr-3">Commentaire d'un mec random qui veut juste se la péter en fait
                                    parce qu'il a fait un truc repsonsive qui lui a pris 100h alors que c'est de l'eau quoi mdr</div>
                                <div></br></div>
                            </div>
                        </div>
                    </div>
                    <div class="single-comment">
                        <div class="row">
                            <div class="col-2">
                                <div class ="pl-3 pt-1 pr-3">user</div>
                                <div class ="pl-3 pt-1 pr-3">profil Picture</div>
                            </div>
                            <div class="col-10">
                                <div class ="pl-3 pt-1 pr-3">date</div>
                                <div class ="pl-3 pt-1 pr-3">Commentaire d'un mec random qui veut juste se la péter en fait
                                    parce qu'il a fait un truc repsonsive qui lui a pris 100h alors que c'est de l'eau quoi mdr</div>
                                <div></br></div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="navigation">
                    <ul class="pagination pl-4 ml-1">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
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
    </body>
</html>