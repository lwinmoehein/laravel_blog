@extends('layouts.app')

@section('action-button')
@auth
    <a href="{{route('articles.index')}}" class="mr-0 mr-md-2 mt-2 text-white w-100 nav-link px-3 py-1">
        <span>Home</span>
    </a>
    <a href="{{route('articles.create')}}" class="mr-0 mr-md-2 mt-2 text-white w-100 nav-link px-3 py-1">
        <span>New</span>
    </a>
    <a href="{{route('articles.search')}}" class="mr-0 mr-md-2 mt-2 text-white w-100 nav-link px-3 py-1">
        <span>Search </span>
    </a>
@endauth
@endsection

@section('content')
<x-error-notification-component/>

<div>
    @if(isset($article))
        <x-article-edit-form-component :tags="$tags" :article="$article"/>
    @else
        <x-article-form-component :tags="$tags" :article="null"/>
    @endif
</div>

@endsection


