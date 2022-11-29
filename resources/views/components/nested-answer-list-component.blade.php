@foreach($answers as $answer)
    @if($loop->index<count($answers))
        <hr/>
    @endif
    <x-answer-item-component :answer="$answer"/>
    @if($loop->index==count($answers)-1)
        <hr/>
    @endif
@endforeach
