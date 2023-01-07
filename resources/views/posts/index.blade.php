@extends('layouts.header')

@section('content')















    @foreach ($posts as $post)
        <div style="margin: 5%">
            <h2>{{ $post -> title }}</h2>
            <div> 
                <span>Creator: {{ $post -> user -> name }}</span>
                <span>{{ $post -> created_at }}</span>
                
            </div>
            <div class="content_container">
                @foreach ($post->postImages as $image)
                    <img src="{{ $image->url }}">
                @endforeach
                <div>{{ $post -> content }}</div>
            </div>
        </div>


    @endforeach    
    <div>
        {{ $posts->links('pagination::bootstrap-4', ['onEachSide' => 5]) }}
    </div>
@endsection