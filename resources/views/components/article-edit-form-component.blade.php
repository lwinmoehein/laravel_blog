<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
</div><div>
    <form action="{{route('articles.update',$article->id)}}" method="POST">
        @csrf
        @method('patch')
        <div class="form-group row">
            <div class="col-xs-2">
                <label for="title" >Article Title</label>
                @if(isset($article))
                  <input class="form-control" type="text" name="title" value="{{$article->title}}" >
                @else
                   <input class="form-control" type="text" name="title" >
                @endif
            </div>
        </div>
        <div class="for-group row">
            <div class="col-xs-2">
                <label for="title">Article body</label>
                @if(isset($article))
                     <textarea class="form-control" name="body" id="body" cols="30" rows="5">{{$article->body}}</textarea>
                @else
                    <textarea class="form-control" name="body" id="body" cols="30" rows="5"></textarea>
                @endif
            </div>
        </div>
        <div class="for-group row">
            <div class="col-xs-2">
                <label for="title">Article tags</label>
                @if(isset($article))
                  <x-tag-select-component :tags="$tags" :article="$article"/>
                @else
                  <x-tag-select-component :tags="$tags" :article="null" />
                @endif
            </div>
        </div>
        <div class="for-group row mt-4">
            <div class="col-xs-2">
                <input type="submit" class="btn btn-primary" value="Post Article">
            </div>

        </div>
        </div>

    </form>
 </div>
