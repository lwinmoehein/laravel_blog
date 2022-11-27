<div>
     @forelse ($articles as $article)
        <x-article-component :article="$article"/>
     @empty
        <h4 class="text-secondary">No articles found.</h4>
     @endforelse
</div>
<div class="justify-content-center align-items-center d-flex mt-5 justify-content-md-start">
    {{ $articles->withQueryString()->links() }}
</div>
