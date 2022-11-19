<div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="GET" action="{{ route('articles.search') }}">
                        <div class="row">
                            <div class="col-8 col-md-8 w-100 p-1">
                                    <input type="text" name="search" class="form-control col" placeholder="Enter User Name or Email For Search" value="{{ old('search') }}">

                            </div>
                            <div class="col-4 col-md-4 p-1">
                                    <button class="w-100 btn btn-success px-1 px-md-4">Search <i class="fa fa-search fa-lg"></i></button>
                            </div>
                        </div>
                    </form>
                    @if($articles)
                    <ul class="container row">
                            @if($articles->count())
                                @foreach($articles as $key => $item)
                                    <div class="col-12 p-2">
                                       <a href="{{route('articles.show',$item->id)}}">{{$item->title}}</a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col">
                                    <p>There are no data.</p>
                                </div>
                            @endif
                    @endif
                    </ul>
            </div>
        </div>
    </div>
</div>
