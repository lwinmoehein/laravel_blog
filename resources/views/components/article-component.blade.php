<div class="container alert alert-secondary p-1 p-md-4 px-0">
    <div class="row p-2">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h3>
                    <a href="{{ route('articles.show', $article->id) }}">
                        {{ $article->title }}
                    </a>
                </h3>
                <small class="">{{ $article->updated_at->diffForHumans() }}</small>
            </div>
            <p>by <span class="text-info">{{ $article->user->name }}</span></p>
            <div>
                @if (count($article->tags) > 0)
                    <p>Tags: @foreach ($article->tags as $tag)
                            <span class="badge badge-success">{{ $tag->name }}</span>
                        @endforeach
                    </p>
                @endif

            </div>
            <p>{{ $article->read_more_description }}</p>
            @foreach ($article->images as $image)
                <img width="100px" height="100px" src="{{ url(str_replace('public', 'storage', $image->url)) }}">
            @endforeach
        </div>
    </div>
</div>
