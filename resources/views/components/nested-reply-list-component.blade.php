@foreach($replies as $reply)
    @if($loop->index<count($replies))
        <hr/>
    @endif
    <x-reply-item-component :reply="$reply" />
    @if($loop->index==count($replies)-1)
        <hr/>
    @endif
@endforeach
