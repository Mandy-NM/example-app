@extends('layouts.header')

<head>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script> --}}

    <script type="text/javascript">

        $(document).ready(function(){

            // Submit the comment form using AJAX
            $('#comment-form').on('submit', function(e) {
                // Prevent the form from being submitted the traditional way
                e.preventDefault();

                // Get the form data
                var formData = $(this).serialize();

                // Submit the form using AJAX
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        // Add the new comment to the comments list
                        $('#comments-list').append('<li class="list-group-item"> user: ' 
                            + response.comment.user.name + '<br>' + response.comment.content + '</li>');

                        // Clear the form
                        $('#comment-form')[0].reset();
                        
                    },
                    error: function(response) {
                        // Display an error message
                        alert('There was an error posting your comment. Please try again.');
                    }
                });
            });

        });


    </script>

</head>

@section('content')

<div class="container mt-4">
    <h1>{{ $post->title }}</h1>
    <div> 
        <p class="card-text">
            <small class="text-muted">
                Created by {{ $post->user->name }}
                on {{ $post->created_at->format('M d, Y') }}
            </small>
        </p>     
    </div>
    @foreach ($post->postImages as $image)
        <img src="{{ $image->url }}" class="" style="width: 50%">
    @endforeach
    <p>{{ $post->content }}</p>
</div>

<!-- Display the comments -->
<div class="container mt-4">
    <h2>Comments</h2>
    <ul class="list-group" id="comments-list">
      @foreach($post-> comments as $comment)
        <li class="list-group-item "> 
            <div>{{ $comment->content }}</div>
            
            <p class="card-text ">
                <small class="text-muted float-right mt-5">
                    Created by {{ $comment->user->name }}
                    on {{ $comment->created_at->format('M d, Y') }}
                </small>
            </p>
        </li>
      @endforeach
    </ul>
</div>
<!-- Display the pagination links -->
{{-- <div class="grid text-center" style="margin-left: 43%; margin-top: 1%;">
    {{ $comments->links('pagination::bootstrap-4', ['onEachSide' => 5]) }}
</div> --}}
  

<!-- Display the comment form -->
<div class="container mt-4">
    <h2>Leave a Comment</h2>
    <form id="comment-form" method="POST" action="{{ route('comments.store') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection