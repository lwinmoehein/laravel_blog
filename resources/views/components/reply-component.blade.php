<div class="container">
    <a href="#">Comments <span class="badge">{{count($article->replies)}}</span></a><br>
    @foreach($article->replies as $reply)
      <div class="container mt-20 mb-20 alert alert-secondary">
        <h3>{{$reply->body}}</h3>
        @can('delete',$reply)
               <form method="post">
                   @csrf
                   @method('DELETE')
                   <input id="reply-id" name="reply-id" type="hidden" value="{{$reply->id}}">
                   <button type="submit" id="reply-delete" class="btn btn-danger">delete reply</button>
               </form>
        @endcan
        <i>replied by</i><span class="badge ">{{$reply->user->name}}</span>

      </div>
    @endforeach
</div>
