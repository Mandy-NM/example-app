@extends('layouts.header')

<head>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
@section('content')













    @foreach ($posts as $post)
        <div style="margin: 5%" class="container-md">
            <h2>{{ $post -> title }}</h2>
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


            {{-- comment --}}
            <div>
                @foreach ($post->comments as $comment)
                <div>
                    <span> user: {{ $comment -> user -> name }}</span>
                    <span> upload at: {{ $comment -> created_at }}</span>
                    <span> {{ $comment -> content }} </span>
                </div>
                @endforeach 
            </div>
        </div>


    @endforeach    
    <div class="grid text-center">
        {{ $posts->links('pagination::bootstrap-4', ['onEachSide' => 5]) }}
    </div>
@endsection