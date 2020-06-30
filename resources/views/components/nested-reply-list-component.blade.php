@foreach($replies as $reply)
<x-reply-item-component :reply="$reply" />
@endforeach
