require('./bootstrap');
window.$ = window.jQuery = require('jquery');

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
    $.ajax({
        url: '/replies/delete',
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
        success: function(result) {
            document.getElementById('reply-list').innerHTML = result;
        },
        data:{
            id:$(this).attr('id'),
        },
        error:function(result){
            alert(result);
         }
    });
});



//edit comment
$('#reply-list').on('click','.reply-edit-btn',function() {

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

