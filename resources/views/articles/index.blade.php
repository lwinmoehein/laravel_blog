@extends('layouts.app')

@section('content')
<x-message-notification-component/>
<x-error-notification-component/>

  <div>
    <x-article-list-component :articles="$articles"/>
  </div>

@endsection

@section('action-button')
@auth
    <a href="{{route('articles.create')}}" class="mr-2 text-white">
        <span>Create New</span>
    </a>
    <a href="{{route('articles.search')}}" class="mr-2 text-white">
        <span>Search Articles</span>
    </a>
@endauth
@endsection

