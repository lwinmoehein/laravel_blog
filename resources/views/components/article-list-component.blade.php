<div>
     @forelse ($articles as $article)
        <x-article-component :article="$article"/>
     @empty
        <h1>No Articles found</h1>
     @endforelse
</div>
<div class="container justify-content-center">
    {{ $articles->links() }}
</div>
