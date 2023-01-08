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


<!-- Use the navbar component to create a header -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: #4e7ed9; font-weight: bold; font-size: 23px;">

        <a class="navbar-brand" href="#">
            <img src=" {{ url('img/blog.svg') }} " width="30" height="30" alt="">
        </a>

        <!-- Use the navbar-nav class to create the navigation menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-3" >
                <li class="nav-item mr-5" >
                <a class="nav-link" href="{{route('posts.index') }}">Home</a>
                </li>
                <li class="nav-item mr-5">
                <a class="nav-link" href="{{route('posts.index') }}">Post</a>
                </li>
            



            {{-- Check if the user has logged in --}}
            @if (auth()->check()) 
                {{-- check if the user is an admin --}}
                @if (auth()->user()->user_type == 'admin') 
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="#">Manage User</a>
                    </li>
            </ul>
                @endif
            </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        {{-- hidden form --}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>                    
                    </div>
                    </li>
                </ul>            
            @else 
            </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>    
            @endif



        </div>
    </nav>
  
<br>












    <nav class="nav_bar">
        <div class="topics">
            <a href=""><div id="home" class="header_item">Home</div></a>
            <div class="vl"></div>
            <a href=" {{route('posts.index') }}"><div id="post" class="header_item">Post</div></a>



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
