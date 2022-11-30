@extends('layouts.app')

@section('content')
    <x-message-notification-component/>
    <x-error-notification-component/>
    <div class="row">
        <div class="col-12 col-md-8">
            {{$user->account_name}}
        </div>
    </div>
@endsection

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

