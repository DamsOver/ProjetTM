$(document).ready(function() {
    // changer le rôle d'un utilisateur
    $(document).on('click', '#MainListGroupUser select', function(e) {
        // on récupère le rôle choisi
        let tmpRole = e.target[e.target.selectedIndex].text;
        let tmpMailUser = e.target.value;
        $.ajax({
            // fichier pour changer le rôle dans la base de donner
            url: "php/updateRole.php",
            type: "POST",
            // envoyer les données nécessaires à updateRole.php via la méthode post
            data: {
                mailUser: tmpMailUser,
                role: tmpRole
            },
            // on en stocke pas dans le cache
            cache: false,
            success: function(dataResult) {

            }
        });
    });

    // supprimer un thème et actualiser la navbar
    $(document).on('click','#MainListGroupTheme button' , function(e) {
        // récupérer le thème à supprimer
        let tmpTheme = e.target.value;
        $.ajax({
            // suppression du thème dans la bdd
            url: "php/supprimerTheme.php",
            type: "POST",
            data: {
                tmpTheme: tmpTheme
            },
            cache: false,
            success: function(dataResult) {
                // actualiser la liste des thèmes dans le menu administrateur
                $.ajax({
                    url: "php/getThemes.php",
                    type: "POST",
                    cache: false,
                    success: function(dataResult2) {
                        $('#MainListGroupTheme').html(dataResult2);
                        $.ajax({
                            // actualiser la nvabar
                            url: "php/getCategories.php",
                            type: "POST",
                            cache: false,
                            success: function(dataResultNavbar) {
                                $('#elts_cat').html(dataResultNavbar);
                            }
                        });
                    }
                });
            }
        });
    });

    // supprimer un utilisateur
    $(document).on('click','#MainListGroupUser button' , function(e) {
        let tmpUserMail = e.target.value;
        $.ajax({
            // supprimer l'utilisateur dans la base de données
            url: "php/supprimerUser.php",
            type: "POST",
            data: {
                tmpUserMail: tmpUserMail
            },
            cache: false,
            success: function(dataResult) {
                $.ajax({
                    // actualiser la liste des utilisateurs dans le menu administrateur
                    url: "php/getUsers.php",
                    type: "POST",
                    cache: false,
                    success: function(dataResult2){
                        $('#MainListGroupUser').html(dataResult2);
                    }
                });
            }
        });
    });

    // ajouter un thème dans une catégorie
    $(document).on('click','#MainAjout button' , function(e) {
        let tmpTheme = document.getElementById("nTheme").value;
        let tmpCategorie = document.getElementById("listCat")[document.getElementById("listCat").selectedIndex].text;
        if(tmpTheme != "") {
            $.ajax({
                // ajout du thème dans la base de données
                url: "php/ajouterTheme.php",
                type: "POST",
                data: {
                    tmpTheme: tmpTheme,
                    tmpCategorie: tmpCategorie
                },
                cache: false,
                success: function(dataResult){
                    // actualiser la liste des thèmes dans le menu administrateur
                    $.ajax({
                        url: "php/getThemes.php",
                        type: "POST",
                        cache: false,
                        success: function(dataResultThemes) {
                            // actualiser la navbar
                            $('#MainListGroupTheme').html(dataResultThemes);
                            $.ajax({
                                url: "php/getCategories.php",
                                type: "POST",
                                cache: false,
                                success: function(dataResultNavbar) {
                                    $('#elts_cat').html(dataResultNavbar);
                                }
                            });
                        }
                    });
                }
            });
        }
    });
});