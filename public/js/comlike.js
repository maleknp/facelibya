var commentId = 0;
$('.like').on('click', function(event) {
    event.preventDefault();
    commentId = event.target.parentNode.parentNode.dataset['commentid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
            method: 'POST',
            url: urlcomLike,
            data: { isLike: isLike, commentId: commentId, _token: token }
        })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == ' Like' ? ' Liked' : ' Like' : event.target.innerText == ' Dislike' ? ' You dont like this post ' : ' Dislike ';

            if (isLike) {
                if (event.target.innerText == ' Like') {
                    event.target.style.color = '#afafaf';
                } else {
                    event.target.style.color = '#F9B500';
                }
            }


        });
})