@extends('layouts.app')

@section('content')
  <div class="container">
    <x-article-list-component :articles="$articles"/>
  </div>
@endsection

