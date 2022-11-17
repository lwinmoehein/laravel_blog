@can('update',$article)
<div class="row m-2 container">
    <div class="col-s">
       <button type="button" class="btn ">
           <a href="{{route('articles.edit',$article->id)}}">Edit Article</a>
        </button>
    </div>
    <div class="col-s">
        <form method="post" action="{{route('articles.delete',$article->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Article</button>
        </form>
    </div>
@endcan
