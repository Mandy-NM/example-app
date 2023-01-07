<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="{{ url('css/header.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body>
    <nav class="nav_bar">
        <div class="topics">
            <a href=""><div id="home" class="header_item">Home</div></a>
            <div class="vl"></div>
            <a href=""><div id="blog" class="header_item">Blog</div></a>
            <div class="vl"></div>
            <a href=""><div id="post" class="header_item">Public Post</div></a>




            {{-- Check if the user has logged in --}}
            @if (auth()->check()) 
                {{-- check if the user is an admin --}}
                @if (auth()->user()->user_type == 'admin') 
                    <div class="vl"></div>
                    <a href=""><div id="" class="header_item">Manage User</div></a>   
                @endif

                <div class="vl"></div>
                <a href=" {{route('profile.edit')}} "><div id="" class="header_item right_side">Profile</div></a>

                <div class="vl"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div id="" class="header_item right_side">Logout</div>
                </a>
                {{-- hidden form --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
            @else 
                <div class="vl"></div>
                <a href="{{ route('login') }}"><div id="post" class="header_item ">Login</div></a>
                

                <div class="vl"></div>
                <a href="{{ route('register') }}"><div id="post" class="header_item">Register</div></a>  
         
            @endif
        </div>
    </nav>

    

    @yield('content')
</body>
</html>
