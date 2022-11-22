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

    $.ajax({
        url: '/replies/create',
        type: 'PUT',
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
        success: function(result) {
            document.getElementById('reply-list').innerHTML = result;
        },
        data:{
            article_id:$('#article_id').val(),
            body:$('#body').val(),
        },
        error:function(result){
            alert(result);
         }
    });
});

//delete comment
$('#reply-list').on('click','.reply-delete-btn',function() {
    console.log($(this).attr('id'));
    $.ajax({
        url: '/api/replies/delete',
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
        success: function(result) {
            console.log(result)
        },
        data:{
            id:$(this).attr('id'),
        },
        error:function(result){
            console.log(result);
         }
    });
});



//edit comment
$('#reply-list').on('click','.reply-edit-btn',function(e) {
    e.preventDefault;

    let reply_id=$(this).attr('id');

    $(this).siblings('.comment-edit-form').toggle();
    $(this).siblings('.comment-edit-form').find('.update').click(function(){
        let edited_reply_body=$(this).siblings('.reply-edit-textarea').val();


        $.ajax({
                url: '/replies',
                type: 'PATCH',
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
                success: function(result) {
                     $('#reply-list').html(result);
                },
                data:{
                    id:reply_id,
                    body:edited_reply_body
                },
                error:function(result){
                    alert(result);
                 }
        });
    });



});

//reply to a comment
$('#reply-list').on('click','.reply-reply-btn',function(e) {
    e.preventDefault;

    let reply_id=$(this).attr('id');
    let article_id=$(this).siblings('.article_id').attr('value');


    $(this).siblings('.comment-reply-form').toggle();
    $(this).siblings('.comment-reply-form').find('.reply').click(function(){
        let reply_body=$(this).siblings('.reply-reply-textarea').val();

        $.ajax({
            url: '/replies/nested',
            type: 'PUT',
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
            success: function(result) {
                document.getElementById('reply-list').innerHTML = result;
            },
            data:{
                id:reply_id,
                body:reply_body,
                article_id:article_id
            },
            error:function(result){
                alert(result);
             }
        });


    });

});

