$('.row .card .card-body a').on('click',function(e){
    let tmpTopic = e.target.textContent;
    let tmpIdTopic = e.target.id;
    window.location.href = 'displayCommentaires.php?gTopic=' + tmpTopic+'&'+'gIdTopic='+tmpIdTopic;
});