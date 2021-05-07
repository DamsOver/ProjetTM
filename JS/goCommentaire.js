$('.row .card .card-body a').on('click',function(e){
    let tmpTopic = e.target.textContent;
    window.location.href = 'displayCommentaires.php?gTopic=' + tmpTopic;
});