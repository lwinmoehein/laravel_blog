<div class="container">
     @forelse ($articles as $article)
        <x-article-component :article="$article"/>
     @empty
        <h1>No articles found</h1>
     @endforelse
</div>
<div class="container">
    {{ $articles->links() }}
</div>
