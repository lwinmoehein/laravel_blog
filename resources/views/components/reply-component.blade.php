<div>
    <a href="#">Comments <span class="badge">{{count($article->replies)}}</span></a><br>
    @foreach($article->replies as $reply)
         <h3>{{$reply->body}}</h3>
         <i>replied by</i><span class="badge ">{{$reply->user->name}}</span>
    @endforeach
</div>
