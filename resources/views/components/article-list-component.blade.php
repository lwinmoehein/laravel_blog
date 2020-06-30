<div class="container">
     @forelse ($articles as $article)
        <x-article-component :article="$article"/>
     @empty
        <h1>No comments found</h1>
     @endforelse
</div>
<div class="container justify-content-center">
    {{ $articles->links() }}
</div>
