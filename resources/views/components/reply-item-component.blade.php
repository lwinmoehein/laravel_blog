<div class="my-3 reply-item">
    <p class="mb-0"><span class="text-primary font-weight-bold">{{$reply->user->name}}</span>
    </p>
    <p   class="reply-body mb-0">{{$reply->body}}</p>

    <div class="d-flex">
        <input type="hidden"   value="{{$reply->article->id}}">
            @can('delete',$reply)
                <input type="button" class="btn text-danger bg-transparent rounded-sm  pr-1 pl-0 py-0 reply-delete-btn" id="{{$reply->id}}" value="delete comment"/>
                <input type="button"  class="btn text-info  bg-transparent rounded-sm px-1 pl-0  py-0 reply-edit-btn" id="{{$reply->id}}"  value="edit comment"/>
            @endcan
        <input type="button"  class="btn text-info  bg-transparent rounded-sm px-1 py-0 reply-edit-btn" id="{{$reply->id}}"  value="reply comment"/>
        <div class="comment-edit-form m-3 p-4 " style="display: none">
            <div class="form-group ">
                <textarea class="form-control reply-edit-textarea"  name="{{$reply->body}}" id="{{$reply->id}}" cols="5" rows="2">{{$reply->body}}</textarea>
                <button class=" update">Update Comment</button>
            </div>
        </div>
    </div>
    <div class="comment-reply-form m-3 p-4 " style="display: none">
        <div class="form-group ">
           <textarea class="form-control reply-reply-textarea" id="{{$reply->id}}" cols="5" rows="2"></textarea>
           <button class=" reply">Reply Comment</button>
        </div>
    </div>
        <div class="container">
              <x-nested-reply-list-component :replies="$reply->replies"/>
        </div>
</div>
