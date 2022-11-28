@extends('layouts.app')

@section('content')
    <x-message-notification-component/>
    <x-error-notification-component/>
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="font-weight-bolder mb-4 d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Notifications</h4>
                <a href="{{route('articles.create')}}" class="mr-0  text-white nav-link px-3 py-1">
                    <span>Filter By</span>
                </a>
            </div>
            <x-notification-list-component :notifications="$notifications"/>
        </div>
    </div>

@endsection

@section('action-button')
    @auth
        <a href="{{route('articles.index')}}" class="mr-0 mr-md-2 mt-2 text-white w-100 nav-link px-3 py-1">
            <span>Home</span>
        </a>
        <a href="{{route('articles.search')}}" class="mr-0 mr-md-2 mt-2 text-white w-100 nav-link px-3 py-1">
            <span>Search </span>
        </a>
    @endauth
@endsection

