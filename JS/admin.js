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
                    success: function(dataResult2) {
                        $('#MainListGroupTheme').html(dataResult2);
                    }
                });
            }
        });
    });

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