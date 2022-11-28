<div class="container alert alert-secondary p-1 p-md-2 px-0">
    <div class="row p-2">
        <div class="col-1 d-flex flex-column justify-content-center align-items-center">
            <form method="POST" action="{{route('questions.vote')}}">
                @csrf
                <input type="hidden" name="vote_type" value="{{$article->is_up_voted?0:1}}">
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <button type="submit" class="btn p-0"> <i class="fa fa-caret-up {{$article->is_up_voted?'text-primary':''}}"></i></button>
            </form>
            <span>{{$article->vote_count}}</span>
            <form method="POST" action="{{route('questions.vote')}}">
                @csrf
                <input type="hidden" name="vote_type" value="{{$article->is_down_voted?-2:-1}}">
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <button type="submit" class="btn p-0"> <i class="fa fa-caret-down {{$article->is_down_voted?'text-primary':''}}"></i></button>
            </form>
        </div>
        <div class="col-10 col-md-11 d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-between">
                    <a class="font-weight-bold" href="{{ route('questions.show', $article->id) }}">
                        {{ $article->title }}
                    </a>
                <small class="">{{ $article->updated_at->diffForHumans() }}</small>
            </div>
            <span>by <span class="text-info">{{ $article->user->name }}</span></span>
            <div>
                @if (count($article->tags) > 0)
                    <span>Tags: @foreach ($article->tags as $tag)
                            <span class="badge badge-success">{{ $tag->name }}</span>
                        @endforeach
                    </span>
                @endif

            </div>
        </div>
    </div>
</div>
