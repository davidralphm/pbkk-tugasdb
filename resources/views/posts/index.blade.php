@extends('posts.base')

@section('title', 'Posts')

@section('content')

@section('heading', 'Posts')

@if (count($posts) == 0)
    <b>There are no posts to show.</b>
    <b>Click <a href="{{ URL::to('posts/create') }}">here</a> to create one.</b>
@else
    <div class="row p-3">
        @foreach ($posts as $key => $value)
            <div class="card p-2 col-sm-12 m-2">
                <div class="card-body">
                    <h5 class="card-title mt-1 mb-3">{{ $value->title }}</h5>
    
                    <p class="card-text">{{ $value->user->name }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection