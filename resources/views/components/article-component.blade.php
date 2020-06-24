<div>
    <h1><a href="{{route('articles.show',$article->id)}}">{{$article->title}}</a></h1>

    <ul>
        @foreach($article->tags as $tag)
         <li>
             <i>
                <x-tag-component :tag="$tag"/>
             </i>
        </li>
        @endforeach
    </ul>

</div>
