<div>
     @forelse ($articles as $article)
        <x-article-component :article="$article"/>
     @empty
        <h1>No Articles found</h1>
     @endforelse
</div>
<div class="justify-content-center align-items-center d-flex mt-5 justify-content-md-start">
    {{ $articles->links() }}
</div>
