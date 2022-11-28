<div>
    <div class="d-flex flex-wrap">
        @foreach($tags as $tag)
            <a class="px-3 py-1 bg-primary rounded-sm m-1 text-white tag" href="{{route('questions.index').'?tag='.$tag->id}}">{{$tag->name}}</a>
        @endforeach
    </div>
</div>
