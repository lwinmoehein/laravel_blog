<div class="">
    <h1>{{$article->title}}</h1>
        <span class="text-primary">{{$article->updated_at->diffForHumans()}}</span>
        <span>posted by </span>
        <span class="badge badge-primary">{{$article->user->name}}</span>
    <p class="mt-3">{{$article->body}}</p>
    <p class="font-weight-bold mt-3" >tagged topics :</p>
    <ul class="mt-0">
        @foreach($article->tags as $tag)
        <li><x-tag-component :tag="$tag"/></li>
        @endforeach
    </ul>
    <x-reply-list-component :article="$article"/>
    <x-reply-form-component :article="$article"/>
    <x-edit-buttons-component :article="$article"/>

</div>
