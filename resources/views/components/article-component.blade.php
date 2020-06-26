<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h1>
            <a href="{{route('articles.show',$article->id)}}">
                {{$article->title}}
            </a>
        </h1>
        <p>{{$article->body}}</p>
        <div>
            <span class="badge">{{$article->updated_at->diffForHumans()}}</span>
                @foreach($article->tags as $tag)
                 <span class="badge">{{$tag->name}}</span>
                @endforeach
        </div>
    </div>
    </div>

  </div>
</div>
