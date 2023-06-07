<!DOCTYPE html>
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

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .log_btn{
                padding-left: 20px;
                padding-right: 20px;
                padding-top: 10px;
                padding-bottom: 10px;
                border-radius: 10px;
                background:black;
                color:white;
                font-size:16px;
                text-decoration: none;
                margin-top: 40px;
                margin-bottom: 40px;
            }

            .log_btn:hover{
                padding-left: 20px;
                padding-right: 20px;
                padding-top: 10px;
                padding-bottom: 10px;
                border-radius: 10px;
                background:white;
                color:black;
                font-size:16px;
                text-decoration: none;
                margin-top: 40px;
                margin-bottom: 40px;
                font-weight:bold;
                transition: all 0.5s ease-in-out;
            }

            .d_menu{
                padding-left:20px;
                padding-right:20px;
                padding-top:10px;
                padding-bottom:10px;
                border-radius: 10px;
                background:#d9a760;
                color:black;
                font-size: 18px;
                text-decoration:none;
                margin-left:10px;
                margin-right:10px;
            }

            
            .d_menu:hover{
                padding-left:20px;
                padding-right:20px;
                padding-top:10px;
                padding-bottom:10px;
                border-radius: 10px;
                background:#d29d51;
                color:white;
                font-size: 18px;
                text-decoration:none;
                margin-left:10px;
                margin-right:10px;
                font-weight:bold;
                transition: all 0.5s ease-in-out;
            }

            .active{
                padding-left:20px;
                padding-right:20px;
                padding-top:10px;
                padding-bottom:10px;
                border-radius: 10px;
                background:#d9a760;
                color:white;
                font-size: 20px;
                text-decoration:none;
                margin-left:10px;
                margin-right:10px;
                font-weight:bold;
                transition: all 0.5s ease-in-out;
            }

            .foot{
                font-size: 18px;
                font-weight: bold;
                color:black;
            }

            .t_line{
                padding-top:5px;
                padding-bottom:5px;
                font-size: 35px;
                font-weight:bold;
            }

            .arrow{
                font-size: 100px;
                font-weight:bold;
            }

        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row d-flex align-items-center justify-content-between" style="background:#fff7eb";>
                <div class="col-auto py-2">
                    <!-- Brand -->
                    <a class="navbar-brand" id="logo_menu1" href="{{route('home')}}">
                        <img src="{{asset('image/logo.png')}}" height="70" alt="" loading="lazy"/>
                    </a>
                </div>
                <div class="col-auto">
                    <a href="{{route('home')}}" class="d_menu">
                        Home
                    </a>
                    <a href="{{route('#about_us')}}" class="d_menu">
                        About Us
                    </a>
                    <a href="{{route('#how_work')}}" class="d_menu">
                        How It Works
                    </a>
                    <a href="{{route('#contact_us')}}" class="d_menu">
                        Contact Us
                    </a>
                    <a href="{{ route('guest.login') }}" class="d_menu {{ (request()->is('guest_login') || request()->is('emp_login') || request()->is('stu_login')) ? 'active' : '' }}">
                        Log in
                    </a>
                    <a href="{{ route('guest.register') }}" class="d_menu {{ (request()->is('guest_register') || request()->is('emp_register') || request()->is('stu_register')) ? 'active' : '' }}">
                        Register
                    </a>
                </div>
            </div>
            <div class="row justify-content-center" style="background:#fff7eb;">
                <div class="col-md-8">
                    <div class="row align-items-center justify-content-center" style="margin-top: 20px !important; margin-bottom: 20px !important;">
                        <div class="col-auto">
                            <span style="font-size: 40px; font-weight: bold; color:black;">Become JobShaker</span>
                        </div>
                        <div class="col-auto"> 
                            <img src="{{asset('image/mini.png')}}" height="100" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="margin-top: 50px !important; margin-bottom: 80px !important;">
                        <div class="card-header text-center" style="background:#fff7eb; color:black;">
                            <h2 style="margin-bottom: 0px !important;"><b>Register Account</b></h2>
                        </div>

                        <div class="card-body" style="padding: 0px !important;">
                            <div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 justify-content-center d-flex" style="background:pink;">
                                            <img src="{{asset('image/employer.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 justify-content-center d-flex" style="background:pink;">
                                            <a href="{{route('emp.register')}}"class="log_btn">
                                                    Join as Employer
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 justify-content-center d-flex" style="background:yellow;">
                                            <img src="{{asset('image/student.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 justify-content-center d-flex" style="background:yellow;">
                                            <a href="{{route('stu.register')}}" class="log_btn">
                                                Join as Student
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center" style="background:#d9a760;">
                <div class="col-auto" style="padding-top: 50px; padding-bottom: 50px; text-align:center;">
                    <span class="foot">All right reserved JobShake &reg; 2023<br>
                        Copyright by JobShake &copy; 2023</span>
                </div>
            </div>
        </div>
    </body>
</html>
