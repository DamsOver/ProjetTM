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