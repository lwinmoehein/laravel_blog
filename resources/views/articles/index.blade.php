@extends('layouts.app')

@section('content')
<x-message-notification-component/>
<x-error-notification-component/>
  <div class="row">
      <div class="col-12 d-block d-md-none">
          <a href="#filter_tags" class="btn btn-default font-weight-bold mb-3 px-0 font-weight-bold" data-toggle="collapse">Filter by Tags <i class="fa fa-caret-down ml-2"></i> </a>
          <div id="filter_tags" class="collapse">
              <x-tags-filter   :tags="$tags"/>
          </div>
          <hr/>
      </div>
      <div class="col-12 col-md-8">
          <div class="font-weight-bolder mb-4 d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Questions</h4>
              <a href="{{route('articles.create')}}" class="mr-0  text-white nav-link px-3 py-1">
                  <span>New Question <i class="fa fa-plus"></i> </span>
              </a>
          </div>
          <x-article-list-component :articles="$articles"/>
      </div>
      <div class="col-md-4 d-none d-md-block">
          <h5 class="font-weight-bold">Filter by tags :</h5>
          <x-tags-filter :tags="$tags"/>
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

