<div class="container">
    <form action="{{route('answers.store')}}" method="post" id="reply_form">
        @csrf
        @method('put')
        <div class="for-group row">
            <div class="col-12 p-0">
                <label for="title">Write an answer for this question</label>
                @if(isset($answer))
                     <textarea class="form-control" name="body" id="body" cols="30" rows="5">{{$answer->body}}</textarea>
                @else
                    <textarea class="form-control" name="body" id="body" cols="30" rows="5"></textarea>
                @endif
            </div>
        </div>
        <input id="article_id" name="article_id" type="hidden" value="{{$question->id}}">
        <div class="form-group row mt-4">
            <div class="col-12 p-0">
                <input type="submit" class="btn btn-primary" value="Post reply" id="comment">
            </div>
        </div>
    </form>
 </div>
