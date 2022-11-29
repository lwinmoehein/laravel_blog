<div class="my-3 reply-item d-flex flex-column">
    <p class="mb-0"><span class="text-primary font-weight-bold">{{$answer->user->name}}</span>
    </p>
    <p class="reply-body mb-0">{{$answer->body}}</p>

    <div>
        <input type="hidden" value="{{$answer->question->id}}">
        @can('modify',$answer)
            <input type="button" class="btn text-danger bg-transparent rounded-sm  pr-1 pl-0 py-0 reply-delete-btn"
                   id="{{$answer->id}}" value="delete comment"/>
            <input type="button" class="btn text-info  bg-transparent rounded-sm px-1 pl-0  py-0 reply-edit-btn"
                   id="{{$answer->id}}" value="edit comment"/>
        @endcan
        <input type="button" class="btn text-info  bg-transparent rounded-sm px-1 py-0 reply-reply-btn"
               id="{{$answer->id}}" value="reply comment"/>
        <div class="text-form comment-edit-form mx-5 mt-3" style="display: none">
            <div class="form-group ">
                <textarea class="form-control reply-edit-textarea" name="{{$answer->body}}" id="{{$answer->id}}"
                          cols="5" rows="2">{{$answer->body}}</textarea>
                <button class="mt-2 update nav-link btn">Update Answer</button>
            </div>
        </div>
        <div class="text-form comment-reply-form  mx-5 mt-3" style="display: none">
            <div class="form-group ">
                <textarea class="form-control reply-reply-textarea" id="{{$answer->id}}" cols="5" rows="2"></textarea>
                <button class="mt-2 nav-link btn reply" data-article-id="{{$answer->question->id}}"> Add Reply
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <x-nested-answer-list-component :replies="$answer->answers"/>
    </div>
</div>
