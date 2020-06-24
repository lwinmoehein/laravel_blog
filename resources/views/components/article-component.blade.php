<div>
    <h3><a href="{{route('articles.show',$article->id)}}">{{$article->title}}</a></h3>

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
