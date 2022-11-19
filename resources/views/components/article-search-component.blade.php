<div class="">
        <div class="col-md-8 px-0">
            <div>
                <div>
                    <form class="container" method="GET" action="{{ route('articles.search') }}">
                        <div class="row">
                            <div class="col-8 col-md-8 w-100 pl-0">
                                <input type="text" name="search" class="form-control col"
                                    placeholder="Enter User Name or Email For Search" value="{{ old('search') }}">

                            </div>
                            <div class="col-4 col-md-4 px-1">
                                <button class="w-100 btn btn-success px-1 px-md-4">Search <i
                                        class="fa fa-search fa-lg"></i></button>
                            </div>
                        </div>
                    </form>
                    @if ($articles)
                        <div class="py-3">
                            @if ($articles->count())
                                @foreach ($articles as $key => $item)
                                    <div class="py-1">
                                        <a href="{{ route('articles.show', $item->id) }}">{{ $item->title }}</a>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <p>Nothing related found to your search.</p>
                                </div>
                            @endif
                    @endif
                </div>
            </div>
        </div>
</div>
