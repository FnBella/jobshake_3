<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('image/mini.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <style>
        
        @media (min-width: 991.98px) {
            /* main {
                transition: all 1s ease-in-out;
            } */
        }
        
        #main_content
        {
            transition: all 0.5s ease-in-out;
        }

        #main-navbar
        {
            transition: all 0.5s ease-in-out;
        }

        #foot_content
        {
            transition: all 0.5s ease-in-out;
        }

        /* Sidebar */
        .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 5px 0 0; /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 260px !important;
        z-index: 600;
        }

        @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }

        }
        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
            background:#d29d51 !important;
            font-weight:bold;
        }

        .sidebar-sticky {
        position: relative;
        top: 0;
        /* height: calc(100vh - 48px); */
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        .m{
            font-size:18px !important;
        }
        
        .t_line{
            padding-top:5px;
            padding-bottom:5px;
            font-size: 20px;
            font-weight:bold;
            transition: all 0.5s ease-in-out;
        }

        .d_new
        {
            padding-left:10px;
            padding-right:10px;
            padding-top:5px;
            padding-bottom:5px;
            border-radius: 10px;
            background:white;
            color:black;
            font-size: 16px;
            text-decoration:none;
            margin-left:10px;
            margin-right:10px;
            margin-top:10px;
            margin-bottom:10px;
        }
 
        .d_new:hover{
            background:white;
            color:black;
            font-size: 16px;
            text-decoration:none;
            font-weight:bold;
            transition: all 0.5s ease-in-out;
        }

        
         .d_new1
        {
            padding-left:10px;
            padding-right:10px;
            padding-top:10px;
            padding-bottom:10px;
            border-radius: 10px;
            /* background:#d9a760; */
            background: black;
            color:white;
            font-size: 16px;
            font-weight:bold;
            text-decoration:none;
            font-weight: bold;
            margin-left:10px;
            margin-right:10px;
            margin-top:10px;
            margin-bottom:10px;
        }
 
        .d_new1:hover{
            background:#d9a760;
            color:black;
            font-size: 16px;
            font-weight: bold;
            text-decoration:none;
            font-weight:bold;
            transition: all 0.5s ease-in-out;
        }
        
        .d_new2
        {
            padding-left:10px;
            padding-right:10px;
            padding-top:5px;
            padding-bottom:5px;
            border-radius: 10px;
            background:#df6e04;
            color:white;
            font-size: 16px;
            font-weight:bold;
            text-decoration:none;
            margin-left:10px;
            margin-right:10px;
            margin-top:10px;
            margin-bottom:10px;
        }
 
        .d_new2:hover{
            background:#df6e04;
            color:white;
            font-size: 16px;
            text-decoration:none;
            font-weight:bold;
            transition: all 0.5s ease-in-out;
        }

        .d_new3
        {
            padding-left:10px;
            padding-right:10px;
            padding-top:5px;
            padding-bottom:5px;
            border-radius: 10px;
            background:#f1cc43;
            color:black;
            font-size: 16px;
            font-weight:bold;
            text-decoration:none;
            margin-left:10px;
            margin-right:10px;
            margin-top:10px;
            margin-bottom:10px;
        }
 
        .d_new3:hover{
            background:black;
            color:white;
            font-size: 16px;
            text-decoration:none;
            font-weight:bold;
            transition: all 0.5s ease-in-out;
        }

        .foot{
                font-size: 18px;
                font-weight:bold;
                color:black;
            }

        .label1{
            padding: 10px;
            font-size: 18px;
        }

        .label2{
            padding: 10px;
            font-size: 18px;
        }

        .approve{
            color:black;
            border:none !important;
            outline:none !important;
            background:none;
        }

        .reject{
            color:black;
            border:none !important;
            outline:none !important;
            background:none;
        }

        .approve:hover{
            color:green;
        }

        .reject:hover{
            color:red
        }

        .edit_btn{
            border:1px solid black;
            color: black;
        }

        .edit_btn:hover{
            border:1px solid white;
            color: white;
            background:black;
        }

        .m_title{
            font-size: 18px;
            font-weight: bold;
            color:white;
            background:black;
            border-radius: 10px;
            padding-left: 100px;
            padding-right: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .button-container {
            margin-top: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .updatebutton{
            margin: 0 5px;
            padding: 5px 8px;
            border-radius: 10px;
            background:green;
            color:white;
            font-size: 16px;
            text-decoration:none;
        }

        .updatebutton:hover{
            margin: 0 5px;
            padding: 5px 8px;
            border-radius: 10px;
            background:green;
            color:black;
            font-size: 16px;
            text-decoration:none;
            font-weight:bold;
            transition: all 0.5s ease-in-out;
        }

        .cancelbutton{
            margin: 0 5px;
            padding: 5px 8px;
            border-radius: 10px;
            background:red;
            color:white;
            font-size: 16px;
            text-decoration:none;
        }

        .cancelbutton:hover{
            margin: 0 5px;
            padding: 5px 8px;
            border-radius: 10px;
            background:red;
            color:black;
            font-size: 16px;
            text-decoration:none;
            font-weight:bold;
            transition: all 0.5s ease-in-out;
        }

        /* .updatebutton {
            margin: 0 5px;
            padding: 10px 20px;
            background-color: green;
            border: none;
            color: black;
            font-size: 14px;
        } */
        .image-container {
            border: 1px solid black;
            width: 400px; /* Set the desired width for the container */
            height: 400px; /* Set the desired height for the container */
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        .nav-tabs .active{
            color:white !important;
            background:Black !important;
        }

        .nav-tabs .nav-link{
            color:black;
        }

        
        /* star rating */
        .star-rating {
            font-size: 0;
            white-space: nowrap;
            display: inline-block;
            /* width: 250px; remove this */
            height: 30px;
            overflow: hidden;
            position: relative;
            background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
            background-size: contain;
        }
        .star-rating i {
            opacity: 0;
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            /* width: 20%; remove this */
            z-index: 1;
            background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
            background-size: contain;
        }
        .star-rating input {
            -moz-appearance: none;
            -webkit-appearance: none;
            opacity: 0;
            display: inline-block;
            /* width: 20%; remove this */
            height: 100%;
            margin: 0;
            padding: 0;
            z-index: 2;
            position: relative;
        }
        .star-rating input:hover + i,
        .star-rating input:checked + i {
            opacity: 1;
        }
        .star-rating i ~ i {
            width: 40%;
        }
        .star-rating i ~ i ~ i {
            width: 60%;
        }
        .star-rating i ~ i ~ i ~ i {
            width: 80%;
        }
        .star-rating i ~ i ~ i ~ i ~ i {
            width: 100%;
        }
        ::after,
        ::before {
            height: 100%;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-align: center;
            vertical-align: middle;
        }

        .star-rating.star-5 {width: 150px;}
        .star-rating.star-5 input,
        .star-rating.star-5 i {width: 20%;}
        .star-rating.star-5 i ~ i {width: 40%;}
        .star-rating.star-5 i ~ i ~ i {width: 60%;}
        .star-rating.star-5 i ~ i ~ i ~ i {width: 80%;}
        .star-rating.star-5 i ~ i ~ i ~ i ~i {width: 100%;}

        /* ----------- */
        
        .list_chat{
            background:#D8C3A5;
            margin: 10px;
            border:2px solid black;
            border-radius: 20px;
            transition: all 0.5s ease-in-out;
            cursor: pointer;
        }
        
        .list_chat:hover{
            background:#fff7eb;
            margin: 10px;
            border:2px solid white;
            border-radius: 20px;
            transition: all 0.5s ease-in-out;
            cursor: pointer;
            color:black;
        }

        .dash_btn_1{
            padding: 20px;
            border-radius:20px;
            border: 2px solid black;
            background:#d9a760;
            color:white;
            transition: all 0.5s ease-in-out;
            text-decoration: none;
            font-size: 24px;
            margin-right: 20px;
            width: 200px;
            text-align:center;
        }

        .dash_btn_2{
            padding: 20px;
            border-radius:20px;
            border: 2px solid black;
            background:#d9a760;
            color:white;
            transition: all 0.5s ease-in-out;
            text-decoration: none;
            font-size: 24px;
            margin-left: 20px;
            width: 200px;
            text-align:center;
        }

        .dash_btn_1:hover{
            padding: 20px;
            border-radius:20px;
            border: 2px solid black;
            background:#D8C3A5;
            color:black;
            transition: all 0.5s ease-in-out;
            text-decoration: none;
            font-size: 24px;
            margin-right: 20px;
            width: 200px;
            text-align:center;
            font-weight:bold;
        }

        .dash_btn_2:hover{
            padding: 20px;
            border-radius:20px;
            border: 2px solid black;
            background:#D8C3A5;
            color:black;
            transition: all 0.5s ease-in-out;
            text-decoration: none;
            font-size: 24px;
            margin-left: 20px;
            width: 200px;
            text-align:center;
            font-weight:bold;
        }

    </style>


</head>
<body>
    <div id="app">
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="d-lg-block sidebar offcanvas offcanvas-start" data-bs-backdrop="false" tabindex="-1" aria-labelledby="offcanvasExampleLabel" style="background:#fff7eb;">
                <!-- Brand -->
                <a class="navbar-brand mx-2" id="logo_menu2" href="#" data-bs-target="#sidebarMenu" data-bs-toggle="collapse" onclick="closeNav()">
                    <img src="{{asset('image/logo.png')}}" class="mt-2" height="80" alt="" loading="lazy"/>
                </a>
                <div class="col-md-12 justify-content-center d-flex mt-2">
                    <h5><b>{{ Auth::user()->name }}</b></h5>
                </div>
                <div class="position-sticky">
                    <div class="list-group list-group-flush mx-3 mt-1">
                        <a href="{{route('student.home')}}" class="list-group-item list-group-item-action py-3 ripple align-items-center d-flex {{ (request()->is('student')) ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt fa-lg fa-fw me-3"></i><span class="m">Dashboard</span>
                        </a>
                        <a href="{{route('student.profile')}}" class="list-group-item list-group-item-action py-3 ripple align-items-center d-flex {{ (request()->is('student/my_profile') || request()->is('student/edit_profile/*')) ? 'active' : '' }}">
                            <i class="fas fa-graduation-cap fa-lg fa-fw me-3"></i><span class="m">My Profile</span>
                        </a>
                        <a href="{{route('student.job')}}" class="list-group-item list-group-item-action py-3 ripple align-items-center d-flex {{ (request()->is('student/my_job') || request()->is('student/view_job_details/*')) ? 'active' : '' }}">
                            <i class="fas fa-briefcase fa-lg fa-fw me-3"></i><span class="m">My Job</span>
                        </a>
                        <a href="{{route('student.my_rating')}}" class="list-group-item list-group-item-action py-3 ripple align-items-center d-flex {{ (request()->is('student/my_rating')) ? 'active' : '' }}">
                            <i class="fas fa-star fa-lg fa-fw me-3"></i><span class="m">My Rating</span>
                        </a>
                        <a href="{{route('student.chat_list')}}" class="list-group-item list-group-item-action py-3 ripple align-items-center d-flex {{ (request()->is('student/my_chat')) ? 'active' : '' }}">
                            <i class="fas fa-comments fa-lg fa-fw me-3"></i><span class="m">My Chat</span>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- Sidebar -->

            <!-- Navbar -->
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white">
                <!-- Container wrapper -->
                <div class="container-fluid">
                    <!-- Toggle button -->
                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button> --}}

                    <div class="row justify-content-between" style="width: 100% !important;">
                        <div class="col-auto align-items-center d-flex">
                            <!-- Brand -->
                            <a class="navbar-brand" id="logo_menu1" href="#" data-bs-target="#sidebarMenu" data-bs-toggle="collapse" onclick="openNav()">
                                <img src="{{asset('image/logo.png')}}" height="80" alt="" loading="lazy"/>
                            </a>
                        </div>
                        <div class="col-auto align-items-center d-flex">  
                            <span class="t_line">The #1 platform for college and university students to get hired.<br>
                            The #1 platform to hire freelancers.</span>
                        </div>
                        <div class="col-auto">

                            <!-- Right links -->
                            <ul class="navbar-nav ms-auto d-flex flex-row">

                                <!-- Avatar -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('archieve/profile/'.Auth::user()->student->profile_pic) }}" class="rounded-circle" height="80" alt="" />
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{route('student.profile')}}">My profile</a></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
        </header>
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main id="main_content" style="margin-top: 50px;">
            @yield('content')
        </main>

        <footer id="foot_content">    
            <div class="row justify-content-center" style="background:#d9a760; margin-left: 0px !important; margin-right: 0px !important;">
                <div class="col-auto" style="padding-top: 50px; padding-bottom: 50px; text-align:center;">
                    <span class="foot">All right reserved JobShake &reg; 2023<br>
                        Copyright by JobShake &copy; 2023</span>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

        /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
        function openNav() {
            document.getElementById("sidebarMenu").style.width = "250px";
            document.getElementById("main_content").style.marginLeft = "250px";
            document.getElementById("foot_content").style.marginLeft = "250px";
            document.getElementById("main-navbar").style.marginLeft = "255px";
            $('#logo_menu1').hide('slow');
            $('#logo_menu2').show('slow');
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("sidebarMenu").style.width = "0";
            document.getElementById("main_content").style.marginLeft = "0";
            document.getElementById("foot_content").style.marginLeft = "0";
            document.getElementById("main-navbar").style.marginLeft = "0";
            $('#logo_menu2').hide('slow');
            $('#logo_menu1').show('slow');
        }

    </script>

</body>
</html>
