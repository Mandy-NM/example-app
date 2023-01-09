@extends('layouts.header')


@section('content')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>



            {{-- the section to display a lists of posts --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-5xl">
                    
                    <table class="table table-striped table-hover table-responsive">
                        <h2 class="text-lg font-medium text-gray-900">
                            @if (auth()->user()->user_type == 'admin') 
                                All Posts
                            @else
                                Your Posts
                            @endif
                        </h2>
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (auth()->user()->user_type == 'admin')
                                @foreach ($all_posts as $post)                              
                                <tr onclick="location.href='{{ route('posts.show', ['id' => $post ->id]) }}';" 
                                    style='cursor: pointer;'>
                                        <th scope="row">{{ $post->id }}</th>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->created_at }}</td>
                                </tr>
                                  
                                  @endforeach  
                            @else
                                @foreach ($posts as $post)
                                <tr onclick="location.href='{{ route('posts.show', ['id' => $post ->id]) }}';" 
                                    style='cursor: pointer;'>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                  </tr>
                                  @endforeach  
                            @endif
                  
                        </tbody>
                    </table>
                    <!-- Center the pagination element -->
                    @if (auth()->user()->user_type == 'admin')
                        <nav>
                            <ul class="pagination d-flex justify-content-center mx-auto">
                                {{ $all_posts->links('pagination::bootstrap-4', ['onEachSide' => 8]) }}
                            </ul>
                        </nav>
                    @else
                        <nav>
                            <ul class="pagination d-flex justify-content-center mx-auto">
                                {{ $posts->links('pagination::bootstrap-4', ['onEachSide' => 8]) }}
                            </ul>
                        </nav>                    
                    @endif


                </div>
            </div>   





            
            



            {{-- the section to display a list of comments --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-5xl">
                    <table class="table table-striped table-hover">
                        <h2 class="text-lg font-medium text-gray-900">
                            @if (auth()->user()->user_type == 'admin') 
                                All Comments
                            @else
                                Your Comments
                            @endif
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




                            @if (auth()->user()->user_type == 'admin')
                                @foreach ($all_comments as $comment)                              
                                <tr onclick="location.href='{{ route('posts.show', ['id' => $comment->post ->id]) }}';" 
                                    style='cursor: pointer;'>
                                        <th scope="row">{{ $comment->id }}</th>
                                        <td>{{ $comment->post->title }}</td>
                                        <td id="shorten_comment{{$comment->id }}">
                                        <script>
                                            words = "{{ $comment-> content }}";
                                            if (words.length > 10) {
                                                words = words.slice(0, 10);
                                                words += words + '...';    
                                            } 
                                            res = document.getElementById('shorten_comment{{$comment->id }}');
                                            res.innerText  = words; 
                                            // $('#shorten_comment{{$comment->id }}').innerText  = words;      
                                        </script>
                                        </td>
                                        <td>{{ $comment->created_at }}</td>
                                </tr>                                                           
                                @endforeach  
                            @else
                                @foreach ($comments as $comment)
                                <tr onclick="location.href='{{ route('posts.show', ['id' => $comment->post ->id]) }}';" 
                                    style='cursor: pointer;'>
                                        <th scope="row">{{ $comment->id }}</th>
                                        <td>{{ $comment->post->title }}</td>
                                        <td id="shorten_comment{{$comment->id }}">
                                            <script>
                                                words = "{{ $comment-> content }}";
                                                if (words.length > 10) {
                                                    words = words.slice(0, 10);
                                                    words += words + '...';    
                                                } 
                                                res = document.getElementById('shorten_comment{{$comment->id }}');
                                                res.innerText  = words; 
                                                // $('#shorten_comment{{$comment->id }}').innerText  = words;      
                                            </script>                                        
                                        <td>{{ $comment->created_at }}</td>
                                </tr> 
                                  @endforeach  
                            @endif

                        </tbody>
                      </table>
                    <!-- Center the pagination element -->
                    @if (auth()->user()->user_type == 'admin')
                        <nav>
                            <ul class="pagination d-flex justify-content-center mx-auto">
                                {{ $all_comments->links('pagination::bootstrap-4', ['onEachSide' => 8]) }}
                            </ul>
                        </nav>
                    @else
                        <nav>
                            <ul class="pagination d-flex justify-content-center mx-auto">
                                {{ $comments->links('pagination::bootstrap-4', ['onEachSide' => 8]) }}
                            </ul>
                        </nav>                    
                    @endif                   
                </div>


                
            </div>
        </div>
    </div>
</x-app-layout>
@endsection