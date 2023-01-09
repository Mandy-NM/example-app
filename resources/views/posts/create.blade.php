@extends('layouts.header')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header h4">Create a New Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_id" value="">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
                        </div>


                        <div class="form-group">
                            <label for="images">Upload Image</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection