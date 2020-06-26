@extends('layouts.app')

@section('content')
<x-message-notification-component/>
<x-error-notification-component/>
  <div class="contaier">
      <h1>List Of Available Articles</h1>
  </div>
  <div class="container">
    <x-article-list-component :articles="$articles"/>
  </div>

@endsection

@section('action-button')
@auth
    <a href="{{route('articles.create')}}" class="mr-2">
        <span>Create New</span>
        <span class="fa fa-plus"></span>
    </a>
@endauth
@endsection

