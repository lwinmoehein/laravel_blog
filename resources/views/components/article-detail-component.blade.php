<div>
    <h1>{{$article->title}}</h1>
    <p>{{$article->body}}</p>
    <h3>tagged topics...</h3>
    <ul>
        @foreach($article->tags as $tag)
        <li><x-tag-component :tag="$tag"/></li>
        @endforeach
    </ul>

</div>
