var postId = 0;
$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
            method: 'POST',
            url: urlLike,
            data: { isLike: isLike, postId: postId, _token: token }
        })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == ' Like' ? ' Liked' : ' Like' : event.target.innerText == ' Dislike' ? ' You dont like this post ' : ' Dislike ';

            if (isLike) {
                if (event.target.innerText == ' Like') {
                    event.target.style.color = '#888888';
                } else {
                    event.target.style.color = '#F9B500';
                }
            }


        });
})