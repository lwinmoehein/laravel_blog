<div class="container mt-20 mb-20 alert alert-secondary reply-item">
    <h3 class="reply-body">{{$reply->body}}</h3>

    @can('delete',$reply)

        <input type="button" class=" reply-delete-btn" id="{{$reply->id}}" value="delete comment"/>
        <input type="button"  class=" reply-edit-btn" id="{{$reply->id}}"  value="edit comment"/>

    @endcan

    <div class="comment-edit-form m-3 p-4 " style="display: none">
        <div class="form-group ">
           <textarea class="form-control reply-edit-textarea"  name="{{$reply->body}}" id="{{$reply->id}}" cols="5" rows="2">{{$reply->body}}</textarea>
           <button class=" update">Update Comment</button>
        </div>
    </div>

    <i>replied by</i><span class="badge ">{{$reply->user->name}}</span>

        <div class="container">
              <x-nested-reply-list-component :replies="$reply->replies"/>
        </div>
</div>
