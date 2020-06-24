<div>
     @foreach ($articles as $article)
        <x-article-component :article="$article"/>
     @endforeach
</div>
