@extends('layouts.header')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header h4">Edit Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('posts.update', ['id' => $post ->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="6" required>{{ $post->content }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="images">Upload Image</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                            @if($post->postImages)
                                <div class="mt-3">
                                    @foreach($post->postImages as $image)
                                        <img src="{{ $image->url }}" class="img-thumbnail" width="150">
                                        {{-- <form id="delete-image-form{{ $image->id }}" action="{{ route('postImages.delete', ['id' => $image -> id,]) }}" 
                                            method="POST" 
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <a href="" onclick="event.preventDefault(); document.getElementById('delete-image-form{{ $image->id }}').submit();">Delete</a> --}}
                                    @endforeach

                            @endif





                        </div>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection