<div class="">
    <h1>{{$question->title}}</h1>
    <span class="text-primary">{{$question->updated_at->diffForHumans()}}</span>
    <span>asked by </span>
    <span class="badge badge-primary">{{$question->user->name}}</span>
    <p class="mt-3">{{$question->body}}</p>
    <p class="font-weight-bold mt-3">Tags :</p>
    <ul class="mt-0">
        @foreach($question->tags as $tag)
            <li>
                <x-tag-component :tag="$tag"/>
            </li>
        @endforeach
    </ul>
{{--    <x-answer-list-component :question="$question"/>--}}
{{--    <x-answer-form-component :question="$question"/>--}}
{{--    <x-edit-buttons-component :question="$question"/>--}}
    <example-component></example-component>

</div>
