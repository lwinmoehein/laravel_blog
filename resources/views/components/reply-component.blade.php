<div class="container">
    <a href="#">Comments <span class="badge">{{count($article->replies)}}</span></a><br>

    @foreach($article->replies as $reply)
       <x-reply-item-component :reply="$reply"/>
    @endforeach

</div>
