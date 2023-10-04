@extends('posts.base')

@section('title', 'Create Post')

@section('content')

@section('heading', 'Create Post')

<form action="/posts" method="post" enctype="multipart/form-data" class="container p-4">
    {{ csrf_field() }}

    <div class="mt-2 mb-2">
        <label for="title" class="form-label">Post Title</label>
        <input class="form-control" type="text" placeholder="Name" name="title" id="title" value="{{ old('title') }}">
    </div>

    <div class="mt-2 mb-2">
        <label for="user_id" class="form-label">User ID</label>
        <select name="user_id" id="user_id" class="form-control">
            <option
                value=""
                disabled
                
                @if (old('user_id') == "")
                    selected
                @endif
            >
                Select one...
            </option>
            
            @foreach ($users as $user)
                <option
                    value="{{ $user->id }}"
                    
                    @if (old('user_id') == $user->id)
                        selected
                    @endif
                >
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <input class="btn btn-primary" type="submit" value="Create Post">
</form>

@endsection