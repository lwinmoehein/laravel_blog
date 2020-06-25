<div>
@php
  $selected_ids=[];
@endphp

@foreach($article->tags as $tag)
  @php
    array_push($selected_ids,$tag->id);
  @endphp
@endforeach

<select class="form-control selectpicker" name="tags[]" id="tags" multiple>
    @if(isset($article))

        @foreach($tags as $tag)
            @if(in_array($tag->id,$selected_ids))
                <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
            @else
                <option value="{{$tag->id}}"  >{{$tag->name}}</option>
            @endif
        @endforeach
    @else
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    @endif

</select>
</div>
