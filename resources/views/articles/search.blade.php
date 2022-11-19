@extends('layouts.app')
@section('action-button')
@auth
    <a href="{{route('articles.index')}}" class="mr-2 text-white">
        <span>Home</span>
    </a>
    <a href="{{route('articles.create')}}" class="mr-2 text-white d-flex align-items-center">
        <span>New Article <i class="fa fa-plus"></i></span>
    </a>
@endauth
@endsection
@section('content')
   <x-article-search-component :articles="$articles"/>
@endsection
