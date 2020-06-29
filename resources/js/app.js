require('./bootstrap');
window.$ = window.jQuery = require('jquery');

$('#submit').on('click',function(e){
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


// $("input:button").click(function()
// {


// });
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


