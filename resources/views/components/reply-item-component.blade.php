<div class="my-3 reply-item d-flex flex-column">
    <p class="mb-0"><span class="text-primary font-weight-bold">{{$reply->user->name}}</span>
    </p>
    <p   class="reply-body mb-0">{{$reply->body}}</p>

    <div>
        <input type="hidden"   value="{{$reply->article->id}}">
            @can('modify',$reply)
                <input type="button" class="btn text-danger bg-transparent rounded-sm  pr-1 pl-0 py-0 reply-delete-btn" id="{{$reply->id}}" value="delete comment"/>
                <input type="button"  class="btn text-info  bg-transparent rounded-sm px-1 pl-0  py-0 reply-edit-btn" id="{{$reply->id}}"  value="edit comment"/>
            @endcan
        <input type="button"  class="btn text-info  bg-transparent rounded-sm px-1 py-0 reply-reply-btn" id="{{$reply->id}}"  value="reply comment"/>
        <div class="text-form comment-edit-form mx-5 mt-3" style="display: none">
            <div class="form-group ">
                <textarea class="form-control reply-edit-textarea"  name="{{$reply->body}}" id="{{$reply->id}}" cols="5" rows="2">{{$reply->body}}</textarea>
                <button class="mt-2 update nav-link btn">Update Comment</button>
            </div>
        </div>
        <div class="text-form comment-reply-form  mx-5 mt-3" style="display: none">
            <div class="form-group ">
                <textarea class="form-control reply-reply-textarea" id="{{$reply->id}}" cols="5" rows="2"></textarea>
                <button class="mt-2 nav-link btn reply" data-article-id="{{$reply->article->id}}" > Reply Comment</button>
            </div>
        </div>
    </div>

        <div class="container">
              <x-nested-reply-list-component :replies="$reply->replies"/>
        </div>
</div>
