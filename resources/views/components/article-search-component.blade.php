<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="GET" action="{{ route('articles.search') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Enter User Name or Email For Search" value="{{ old('search') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if($articles)
                    <ul class="list-group"  >

                            @if($articles->count())
                                @foreach($articles as $key => $item)
                                    <div class="list-group-item w-50">
                                       <a href="{{route('articles.show',$item->id)}}">{{$item->title}}</a>
                                    </div>
                                @endforeach
                            @else
                                <div class="list-group-item w-50">
                                    <p>There are no data.</p>
                                </div>
                            @endif
                    @endif
                    </ul>
            </div>
        </div>
    </div>
</div>
