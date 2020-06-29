<div class="container">
    <a href="#">Comments <span class="badge">{{count($article->replies)}}</span></a><br>

    @foreach($article->replies as $reply)
    <div class="container mt-20 mb-20 alert alert-secondary">
      <h3>{{$reply->body}}</h3>

      @can('delete',$reply)

        <input type="button" class="btn btn-danger reply-delete-btn" id="{{$reply->id}}" value="delete comment"/>

      @endcan

      <i>replied by</i><span class="badge ">{{$reply->user->name}}</span>

    </div>
  @endforeach

</div>
