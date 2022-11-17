@extends('layouts.app')

@section('action-button')
@auth
    <a href="{{route('articles.index')}}" class="mr-2 text-white">
        <span>Home</span>

    </a>
@endauth
@endsection

@section('content')
<x-error-notification-component/>

<div class="container">
    @if(isset($article))
        <x-article-edit-form-component :tags="$tags" :article="$article"/>
    @else
        <x-article-form-component :tags="$tags" :article="null"/>
    @endif
</div>

@endsection


