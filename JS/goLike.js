$('#mainSection .grid-wrapper .comments .card .card-body .card-text a').on('click',function(e){
    let tmpComm = e.target.id;
    window.location.href = 'displayTopics.php?gTopic=' + $_GET("gTopic") + "tmpComm=" + tmpComm;
});