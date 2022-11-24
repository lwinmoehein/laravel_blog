require('./bootstrap');
const alert = require("bootstrap/js/src/alert");
window.$ = window.jQuery = require('jquery');

//upload image
function uploadImage(){
    $image=$('#imgInp').val();
    return "hola";
}

//create new comment
$('#comment').on('click',function(e){
    e.preventDefault();

    axios(
        "/api/replies/create",{
            method:"PUT",
            params: {
                article_id:$('#article_id').val(),
                body:$('#body').val(),
            },
        }).then(res=>{
         window.location.reload();
    })
});

//delete comment
$('#reply-list').on('click','.reply-delete-btn',function() {
    axios(
        "/api/replies/delete",{
        method:"DELETE",
            params: {
                id: $(this).attr('id')
            },
    }).then(res=>{
        window.location.reload();
    })
});



//edit comment
$('#reply-list').on('click','.reply-edit-btn',function(e) {
    e.preventDefault;

    let reply_id=$(this).attr('id');

    $(this).siblings('.text-form').css('display','none');

    $(this).siblings('.comment-edit-form').css('display','block');
    $(this).siblings('.comment-edit-form').find('.update').click(function(){
        let edited_reply_body=$(this).siblings('.reply-edit-textarea').val();

        axios(
            "/api/replies",{
                method:"PATCH",
                params: {
                    id:reply_id,
                    body:edited_reply_body
                },
            }).then(res=>{
            window.location.reload();
        })
    });



});

//reply to a comment
$('#reply-list').on('click','.reply-reply-btn',function(e) {
    e.preventDefault;

    let reply_id=$(this).attr('id');

    $(this).siblings('.text-form').css('display','none');

    $(this).siblings('.comment-reply-form').css('display','block');
    $(this).siblings('.comment-reply-form').find('.reply').click(function(){
        let reply_body=$(this).siblings('.reply-reply-textarea').val();
        let article_id=$(this).data('article-id');

        console.log(article_id);

        axios(
            "/api/replies/nested",{
                method:"PUT",
                params: {
                            id:reply_id,
                            body:reply_body,
                            article_id:article_id
                },
            }).then(res=>{
            window.location.reload();
        })

    });

});

