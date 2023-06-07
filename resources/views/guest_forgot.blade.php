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
                font-weight:bold;
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
            <div class="row d-flex align-items-center justify-content-between" style="background:#fff7eb;">
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
                            <span style="font-size: 40px; font-weight: bold; color:black;">JobShake Community</span>
                        </div>
                        <div class="col-auto"> 
                            <img src="{{asset('image/mini.png')}}" height="100" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card" style="margin-top: 50px !important; margin-bottom: 80px !important;">
                        <div class="card-header text-center" style="background:#d9a760; color:black;">
                            <h2 style="margin-bottom: 0px !important;"><b>Forgot Password</b></h2>
                        </div>

                        <div class="card-body" style="padding: 0px !important;">
                            <div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px; margin-left: 0px !important; margin-right: 0px !important;">
                                <div class="col-md-8" style="text-align:justify;">
                                    <h4>
                                        Join Jobshake community of job seekers, the best place for students, early career professionals,
                                        and career changers to find freelance jobs.
                                    </h4>
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin-left: 0px !important; margin-right: 0px !important;">
                                @if (session('failed'))
                                    <div class="alert alert-danger justify-content-center">
                                        {{ session('failed') }}
                                    </div>
                                @endif
                                <div class="col-md-6 align-items-center">
                                    <form method="GET" action="{{ route('guest.check_email') }}">
                                        @csrf
                                        <div class="row mb-3" style="margin-top:100px;">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Check') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <img src="{{asset('image/log.jpg')}}" alt="" width="400px" height="auto">
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
