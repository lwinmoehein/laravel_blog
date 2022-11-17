@extends('layouts.app')
@section('action-button')
@auth
    <a href="{{route('articles.index')}}" class="mr-2 text-white">
        <span>Home</span>

    </a>
@endauth
@endsection
@section('content')
   <x-article-search-component :articles="$articles"/>
@endsection
