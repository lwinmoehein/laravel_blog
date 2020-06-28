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

$('#reply-delete').on('click',function(e){
    e.preventDefault();

    $.ajax({
        url: '/replies/'+$('#reply-id').val(),
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
        success: function(result) {
            document.getElementById('reply-list').innerHTML = result;
        },
        data:{

        },
        error:function(result){
            alert(result);
         }
    });
});


