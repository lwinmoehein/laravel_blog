@extends('layouts.app')

@section('action-button')
@auth
    <a href="{{route('questions.index')}}" class="mr-0 mr-md-2 mt-2 text-white w-100 nav-link px-3 py-1">
        <span>Home</span>
    </a>
    <a href="{{route('questions.search')}}" class="mr-0 mr-md-2 mt-2 text-white w-100 nav-link px-3 py-1">
        <span>Search </span>
    </a>

@endauth
@endsection

@section('content')

<x-message-notification-component/>
<x-error-notification-component/>
<x-question-detail-component :question="$question"/>

@endsection


