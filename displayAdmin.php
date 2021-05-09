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
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <script type="text/javascript" src="js/index.js"></script>
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
        </ul>
        </div>
        <div class="col-6 pb-4" id="MainListGroupTheme">
        <?php
            include("php/getThemes.php");
        ?>
        <div class="container.fluid" id = themeUser>
            <div class="row">
                <div class="col-6" style="color:white;">
                </div>
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

        <script>
            $(document).ready(function() {
                $(document).on('click', '#MainListGroupUser select', function(e) {
                    let tmpRole = e.target[e.target.selectedIndex].text;
                    let tmpMailUser =e.target.value;
                    $.ajax({
                        url: "php/updateRole.php",
                        type: "POST",
                        data: {
                            mailUser: tmpMailUser,
                            role: tmpRole
                        },
                        cache: false,
                        success: function(dataResult){
                            console.log(dataResult);
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(document).on('click','#MainListGroupTheme button' , function(e) {
                    let tmpTheme = e.target.value;
                    $.ajax({
                        url: "php/supprTheme.php",
                        type: "POST",
                        data: {
                            tmpTheme: tmpTheme
                        },
                        cache: false,
                        success: function(dataResult){
                            $.ajax({
                                url: "php/getThemes.php",
                                type: "POST",
                                data: {
                                },
                                cache: false,
                                success: function(dataResult2){
                                    /*var dataResult2 = JSON.parse(dataResult2);*/
                                    $('#MainListGroupTheme').html(dataResult2);
                                }
                            });
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(document).on('click','#MainListGroupUser button' , function(e) {
                    let tmpUserMail = e.target.value;
                    $.ajax({
                        url: "php/supprUser.php",
                        type: "POST",
                        data: {
                            tmpUserMail: tmpUserMail
                        },
                        cache: false,
                        success: function(dataResult){
                            $.ajax({
                                url: "php/getUsers.php",
                                type: "POST",
                                data: {
                                },
                                cache: false,
                                success: function(dataResult2){
                                    $('#MainListGroupUser').html(dataResult2);
                                }
                            });
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(document).on('click','#MainAjout button' , function(e) {
                    let tmpTheme = document.getElementById("nTheme").value;
                    let tmpCategorie = document.getElementById("listCat")[document.getElementById("listCat").selectedIndex].text;
                    if(tmpTheme != "") {
                        $.ajax({
                            url: "php/ajouterTheme.php",
                            type: "POST",
                            data: {
                                tmpTheme: tmpTheme,
                                tmpCategorie: tmpCategorie
                            },
                            cache: false,
                            success: function(dataResult){
                                $.ajax({
                                    url: "php/getThemes.php",
                                    type: "POST",
                                    data: {
                                    },
                                    cache: false,
                                    success: function(dataResult2){
                                        $('#MainListGroupTheme').html(dataResult2);
                                    }
                                });
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>