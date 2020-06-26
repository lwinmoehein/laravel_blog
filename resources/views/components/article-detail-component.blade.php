<div class="container alert alert-primary">
    <h1>{{$article->title}}</h1>
    <span class="badge badge-secondary">{{$article->updated_at->diffForHumans()}}</span>
    <span class="badge badge-primary">posted by{{$article->user->name}}</span>
    <p>{{$article->body}}</p>
    <h3>tagged topics...</h3>
    <ul>
        @foreach($article->tags as $tag)
        <li><x-tag-component :tag="$tag"/></li>
        @endforeach
    </ul>

</div>
