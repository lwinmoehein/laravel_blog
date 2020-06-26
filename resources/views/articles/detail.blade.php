@extends('layouts.app')

@section('content')

<x-message-notification-component/>
<x-error-notification-component/>
<x-article-detail-component :article="$article"/>
<x-reply-list-component :article="$article"/>
<x-reply-form-component :article="$article"/>
<x-edit-buttons-component :article="$article"/>

@endsection

@section('action-button')
@auth
    <a href="{{route('articles.create')}}" class="mr-2">
        <span>Create New</span>
    </a>
    <a href="{{route('articles.index')}}" class="mr-2">
        <span>Home</span>

    </a>
@endauth
@endsection
