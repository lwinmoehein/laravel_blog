<div class="">
    <h1>{{$question->title}}</h1>
    <span class="text-primary">{{$question->updated_at->diffForHumans()}}</span>
    <span>asked by </span>
    <span class="text-primary font-weight-bold">{{$question->user->name}}</span>
    <p class="mt-3">{{$question->body}}</p>
    <hr class="mt-3"/>
    <p class="font-weight-bold mt-3">Tags :</p>
    <div class="mt-0 d-flex flex-wrap">
        @foreach($question->tags as $tag)
            <span class="badge badge-primary mx-1 px-2">
                <x-tag-component :tag="$tag"/>
            </span>
        @endforeach
    </div>
{{--    <x-answer-list-component :question="$question"/>--}}
{{--    <x-answer-form-component :question="$question"/>--}}
{{--    <x-edit-buttons-component :question="$question"/>--}}
    <answer-list-component :question="{{$question}}"></answer-list-component>

</div>
