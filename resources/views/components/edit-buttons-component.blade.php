@can('update',$article)
<div class="row m-2">
    <div class="col-s">
       <button type="button" class="btn ">
           <a href="{{route('articles.edit',$article->id)}}">Edit</a>
        </button>
    </div>
    <div class="col-s">
        <form method="post" action="{{route('articles.delete',$article->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">delete</button>
        </form>
    </div>
@endcan
