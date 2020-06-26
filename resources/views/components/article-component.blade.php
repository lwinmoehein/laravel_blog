<div class="container alert alert-secondary p-20">
    <div class="row">
    <div class="col-s">
        <h3>
            <a href="{{route('articles.show',$article->id)}}">
                {{$article->title}}
            </a>
        </h3>
        <p>{{$article->body}}</p>
        <div>
            <span class="badge badge-secondary">{{$article->updated_at->diffForHumans()}}</span>
            @foreach($article->tags as $tag)
                <span class="badge badge-success">{{$tag->name}}</span>
            @endforeach
        </div>
    </div>
    </div>
</div>
