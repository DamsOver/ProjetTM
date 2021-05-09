$(document).ready(function() {
    // Search url variable
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);
    let vTheme = urlParams.get('gTheme');

    // ajouter la liste des topics d'un thème
    $.ajax({
        url: "php/getTopics.php",
        type: "POST",
        data: {
            theme: vTheme
        },
        cache: false,
        success: function(dataResultTopics){
            // actualiser l'affichage
            $('#topics').html(dataResultTopics);
        }
    });

    // afficher le bouton de suppression de topic si le grade de l'utilisateur le permet
    $.ajax({
        url: "php/getGrade.php",
        type: "POST",
        cache: false,
        success: function(dataResultGrade){
            let vGrade = dataResultGrade;
            if(vGrade == '2' || vGrade == '3') {
                $(document).on('click', '#btnDelTopic', function(e) {
                    let idTopic = e.target.value;
                    $.ajax({
                        url: "php/supprTopic.php",
                        type: "POST",
                        data: {
                            idTopic: idTopic
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
                                    $('#topics').html(dataResult2);
                                }
                            });
                        }
                    });
                });
            }
        }
    });

    // permettre de créer un nouveau topic, sauf pour les visiteurs
    $.ajax({
        url: "php/getGrade.php",
        type: "POST",
        cache: false,
        success: function(dataResultGrade2) {
            let vGrade = dataResultGrade2;
            if(vGrade == '1' || vGrade == '2' || vGrade == '3') {
                $('#butSubmitTopic').on('click', function() {
                    let vNomTopic = $('#InputNomTopic').val();
                    let vTextTopic = document.getElementById("InputTextTopic").value;
                    if(vNomTopic != "" && vTextTopic != "" && vTheme != ""){
                        // enregistrer le topic dans la bdd
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
                                // actualiser l'affichage des topics sur la page
                                $.ajax({
                                    url: "php/getTopics.php",
                                    type: "POST",
                                    data: {
                                        theme: vTheme
                                    },
                                    cache: false,
                                    success: function(dataResultTopics){
                                        $('#topics').html(dataResultTopics);
                                        $("#topicAjoute").show();
                                        setTimeout(function() { $("#topicAjoute").hide(); }, 5000);
                                    }
                                });
                            }
                        });
                    }
                    else{
                        alert('Veuillez remplir tout les champs.');
                    }
                });
            }
        }
    });
});