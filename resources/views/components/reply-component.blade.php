<div class="container alert alert-primary m-10 ">
    <a href="#">Comments <span class="badge">{{count($article->replies)}}</span></a><br>
    @foreach($article->replies as $reply)
         <h3>{{$reply->body}}</h3>
         @can('delete',$reply)
                <form method="post" action="{{route('replies.delete',$reply->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">delete reply</button>
                </form>
        @endcan
         <i>replied by</i><span class="badge ">{{$reply->user->name}}</span>
    @endforeach
</div>
