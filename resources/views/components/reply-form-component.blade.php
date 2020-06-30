<div class="container m-3 p-4">
    <form action="{{route('replies.store')}}" method="post" id="reply_form">
        @csrf
        @method('put')
        <div class="for-group row">
            <div class="col-xs-2">
                <label for="title">Write a reply to this article</label>
                @if(isset($reply))
                     <textarea class="form-control" name="body" id="body" cols="30" rows="5">{{$reply->body}}</textarea>
                @else
                    <textarea class="form-control" name="body" id="body" cols="30" rows="5"></textarea>
                @endif
            </div>
        </div>
        <input id="article_id" name="article_id" type="hidden" value="{{$article->id}}">
        <div class="form-group row mt-4">
            <div class="col-xs-2">
                <input type="submit" class="btn btn-primary" value="Post reply" id="comment">
            </div>

        </div>
        </div>

    </form>
 </div>
