@extends('layouts.app')

@section('content')

@foreach ($articles as $article)
<x-article-component :article="$article"/>
@endforeach

@endsection

