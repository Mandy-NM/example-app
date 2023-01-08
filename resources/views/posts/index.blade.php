@extends('layouts.header')

{{-- <head>        
    <!-- Load the Bootstrap CSS styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head> --}}
@section('content')

    <h1 class="display-4 text-center text-primary" style="margin: 4%">Blog</h1>
    <!-- Display the list of posts -->
    <div class="card-columns mt-4" style="margin: 5%">
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><a href=" {{ route('posts.show', ['id' => $post ->id]) }}" style="text-decoration: none;">{{ $post -> title }}</a></h5>
                    <div class="row mt-3">
                        @foreach ($post->postImages as $image)
                            <div class="col-3">
                                <img src="{{ $image->url }}" class="img-fluid">
                            </div>
                        @endforeach
                    </div>                      
                    <p class="card-text">{{ $post->content }}</p>                  
                    <p class="card-text">
                        <small class="text-muted">
                            Created by {{ $post->user->name }}
                            on {{ $post->created_at->format('M d, Y') }}
                        </small>
                    </p>
                <!-- Display the "Edit" button for the creator of each post -->
                @if (Auth::check() && Auth::user()->id == $post->user->id)
                    <a href="#" class="btn btn-primary mt-2">Edit</a>
                @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Center the pagination element -->
    <nav>
        <ul class="pagination d-flex justify-content-center mx-auto">
            {{ $posts->links('pagination::bootstrap-4', ['onEachSide' => 6]) }}
        </ul>
    </nav>



@endsection