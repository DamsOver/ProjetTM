$('.row .card .card-body a').on('click',function(e){
    let tmpTopic = e.target.textContent;
    let tmpIdTopic = e.target.id;
    console.log(tmpIdTopic);
    window.location.href = 'displayCommentaires.php?gTopic=' + tmpTopic+'&'+'gIdTopic='+tmpIdTopic;
});