$(document).on('click', '.row .card .card-body a', function(e) {
    let tmpTopic = e.target.textContent;
    let tmpIdTopic = e.target.id;
    window.location.href = 'displayCommentaires.php?gTopic=' + tmpTopic+'&'+'gIdTopic='+tmpIdTopic;
});