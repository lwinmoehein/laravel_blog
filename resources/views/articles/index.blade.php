@extends('layouts.app')

@section('content')
  <div class="container">
    <x-article-list-component :articles="$articles"/>
  </div>
  @if(session()->has('message'))
  <div class="alert alert-success">
      {{ session()->get('message') }}
  </div>
@endif
@endsection

@section('action-button')
@auth
    <a href="{{route('articles.create')}}" class="mr-2">
        <span>Create New</span>
        <span class="fa fa-plus"></span>
    </a>
@endauth
@endsection

