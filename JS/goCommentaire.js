$('.list-group .list-group-item a').on('click',function(e){
    let tmpTopic = e.target.textContent;
    window.location.href = 'displayCommentaires.php?gTopic=' + tmpTopic;
});