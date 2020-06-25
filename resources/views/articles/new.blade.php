@extends('layouts.app')

@section('action-button')
@auth
    <a href="{{route('articles.index')}}" class="mr-2">
        <span>Home</span>

    </a>
@endauth
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" data-dismiss="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <a href = "#" class = "close" data-dismiss = "alert">
            &times;
         </a>
    </div>
@endif

<div class="container">
    @if(isset($article))
        <x-article-edit-form-component :tags="$tags" :article="$article"/>
    @else
        <x-article-form-component :tags="$tags" :article="null"/>
    @endif
</div>

@endsection


