@can('modify',$question)
<div class="d-flex col-12 p-0 mt-5">
    <div class="w-100 mr-3 col-md-2 px-0">
       <button type="button" class="btn btn-primary w-100">
           <a class="text-white" href="{{route('questions.edit',$question->id)}}">Edit Question</a>
        </button>
    </div>
    <div class="w-100 ml-3 col-md-2 px-0">
        <form method="post" action="{{route('questions.delete',$question->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">Delete Question</button>
        </form>
    </div>
@endcan
