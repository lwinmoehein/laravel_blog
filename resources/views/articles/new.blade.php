@extends('layouts.app')
@section('content')
<div class="container">
    <x-article-form-component :tags="$tags" :article="$article"/>
</div>

@endsection


