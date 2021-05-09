$(document).ready(function() {
    // Search url variable
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);
    let vIdTopic = urlParams.get('gIdTopic');
    let vTopic = urlParams.get('gTopic');

    $.ajax({
        url: "php/getGrade.php",
        type: "POST",
        cache: false,
        success: function(dataResult3){
            let vGrade = dataResult3;
            if(vGrade=='2' || vGrade=='3') {
                $(document).on('click', '#btnDelCom', function(e) {
                    let idCom = e.target.value;
                    $.ajax({
                        url: "php/supprCom.php",
                        type: "POST",
                        data: {
                            idCom: idCom
                        },
                        cache: false,
                        success: function(dataResult){
                            $.ajax({
                                url: "php/getCommentaires.php",
                                type: "POST",
                                data: {
                                    idTopic: vIdTopic,
                                    topic:vTopic
                                },
                                cache: false,
                                success: function(dataResult2){
                                    $('#comsCom').html(dataResult2);
                                }
                            });
                        }
                    });
                });
            }
        }
    });

    $.ajax({
        url: "php/getEmail.php",
        type: "POST",
        cache: false,
        success: function(dataResult3){
            let vMail = dataResult3;
            $(document).on('click', '#btnLikeC', function(e) {
                let vIdCom2 = e.currentTarget.value;
                if(vMail!="" && vIdCom2!=""){
                    $.ajax({
                        url: "php/saveLike.php",
                        type: "POST",
                        data: {
                            mail: vMail,
                            idCom: vIdCom2
                        },
                        cache: false,
                        success: function(dataResult){
                            $.ajax({
                                url: "php/getLike.php",
                                type: "POST",
                                data: {
                                    mail: vMail,
                                    idCom: vIdCom2
                                },
                                cache: false,
                                success: function(dataResult){
                                    $('.'+vIdCom2).html(dataResult);
                                }
                            });
                        }
                    });
                }
            });
        }
    });

    $.ajax({
        url: "php/getCommentaires.php",
        type: "POST",
        data: {
            idTopic: vIdTopic,
            topic:vTopic
        },
        cache: false,
        success: function(dataResult2){
            $('#comsCom').html(dataResult2);
        }
    });

    $('#butSubmitCom').on('click', function() {
        let vTextCom = $('#InputTextCom').val();
        if(vTextCom!="" && vIdTopic!=""){
            $.ajax({
                url: "php/saveCom.php",
                type: "POST",
                data: {
                    textCom: vTextCom,
                    idTopic: vIdTopic
                },
                cache: false,
                success: function(dataResult){
                    $.ajax({
                        url: "php/getCommentaires.php",
                        type: "POST",
                        data: {
                            idTopic: vIdTopic,
                            topic:vTopic
                        },
                        cache: false,
                        success: function(dataResult2){
                            $('#formComm').find('textarea').eq(0).val('');
                            $('#comsCom').html(dataResult2);
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