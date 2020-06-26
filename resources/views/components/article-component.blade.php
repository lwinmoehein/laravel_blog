<div class="container  p-2 text-success bg-light p-5 m-4">
    <div class="row">
      <div class="col-sm">
          <div class="row">
                <h3><a href="{{route('articles.show',$article->id)}}">{{$article->title}}</a></h3>
          </div>
          <div class="row">
            <ul>
                @forelse ($article->tags as $tag)
                <li>
                    <i>
                       <x-tag-component :tag="$tag"/>
                    </i>
               </li>
                @empty
                <p>No tags</p>
                @endforelse
            </ul>
          </div>
        </div>

    </div>
    <div class="row m-2">
        <div class="col-s">
           <button type="button" class="btn "><a href="{{route('articles.edit',$article->id)}}">Edit</a></button>
        </div>
        <div class="col-s">
            <form method="post" action="{{route('articles.delete',$article->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
            </form>
        </div>
 </div>


</div>
