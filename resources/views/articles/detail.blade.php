@extends('layouts.app')

@section('content')
<x-article-detail-component :article="$article"/>
@endsection

@section('action-button')
@auth
    <a href="{{route('articles.create')}}" class="mr-2">
        <span>Create New</span>
        <span class="fa fa-plus"></span>
    </a>
@endauth
@endsection
