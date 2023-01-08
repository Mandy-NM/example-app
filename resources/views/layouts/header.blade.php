<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="{{ url('css/header.css') }}">
    <!-- Load the Bootstrap CSS styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Load the jQuery and Bootstrap JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
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
