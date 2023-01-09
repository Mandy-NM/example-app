@extends('layouts.header')

@section('content')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- the section to display a lists of posts --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-5xl">
                <h2 class="text-lg font-medium text-gray-900">
                        User
                </h2>   
                  <p>Name: {{$user -> name}}</p>
                </div>

            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-5xl">
                    
                    <table class="table table-striped table-hover table-responsive">
                        <h2 class="text-lg font-medium text-gray-900">
                                All Posts
                        </h2>
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                                @foreach ($posts as $post)
                                <tr onclick="location.href='{{ route('posts.show', ['id' => $post ->id]) }}';" 
                                    style='cursor: pointer;'>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                  </tr>
                                  @endforeach  
                         
                  
                        </tbody>
                    </table>
                    <!-- Center the pagination element -->
                        <nav>
                            <ul class="pagination d-flex justify-content-center mx-auto">
                                {{ $posts->links('pagination::bootstrap-4', ['onEachSide' => 8]) }}
                            </ul>
                        </nav>                    
                </div>
            </div>   





            
            



            {{-- the section to display a list of comments --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-5xl">
                    <table class="table table-striped table-hover">
                        <h2 class="text-lg font-medium text-gray-900">
                                All Comments
                        </h2>

                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Post Title</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Comment At</th>
                          </tr>
                        </thead>
                        <tbody>





                                @foreach ($comments as $comment)
                                <tr onclick="location.href='{{ route('posts.show', ['id' => $comment->post ->id]) }}';" 
                                    style='cursor: pointer;'>
                                        <th scope="row">{{ $comment->id }}</th>
                                        <td>{{ $comment->post->title }}</td>
                                        <td>{{ $comment->created_at }}</td>
                                </tr> 
                                  @endforeach  


                        </tbody>
                      </table>
                    <!-- Center the pagination element -->

                        <nav>
                            <ul class="pagination d-flex justify-content-center mx-auto">
                                {{ $comments->links('pagination::bootstrap-4', ['onEachSide' => 8]) }}
                            </ul>
                        </nav>                    
                        
                </div>


                
            </div>
        </div>
    </div>
</x-app-layout>

@endsection