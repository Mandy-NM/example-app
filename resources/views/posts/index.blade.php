@extends('layouts.header')

{{-- <head>        
    <!-- Load the Bootstrap CSS styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head> --}}
@section('content')













    @foreach ($posts as $post)
        <div style="margin: 5%" class="container-md">
            <h2> <a href=" {{ route('posts.show', ['id' => $post ->id]) }}" style="text-decoration: none;">{{ $post -> title }}</a> </h2>
            <div> 
                <span>Creator: {{ $post -> user -> name }}</span>
                <span>{{ $post -> created_at }}</span>
                
            </div>
            <div class="content_container">
                @foreach ($post->postImages as $image)
                    <img src="{{ $image->url }}" class="" style="width: 50%">
                @endforeach
                {{-- img-fluid mx-auto d-block --}}
                <div>{{ $post -> content }}</div>
            </div>
        </div>


    @endforeach    
    <div class="grid text-center">
        {{ $posts->links('pagination::bootstrap-4', ['onEachSide' => 5]) }}
    </div>
@endsection