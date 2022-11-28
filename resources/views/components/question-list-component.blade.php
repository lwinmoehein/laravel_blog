<div>
     @forelse ($questions as $question)
        <x-article-component :question="$question"/>
     @empty
        <h4 class="text-secondary">No questions were found.</h4>
     @endforelse
</div>
<div class="justify-content-center align-items-center d-flex mt-5 justify-content-md-start">
    {{ $questions->withQueryString()->links() }}
</div>
