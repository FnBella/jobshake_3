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
                background:#138d75;
                color:white;
                font-size: 20px;
                text-decoration:none;
                margin-left:10px;
                margin-right:10px;
                font-weight:bold;
                transition: all 0.5s ease-in-out;
            }

            .t_line{
                padding-top:5px;
                padding-bottom:5px;
                font-size: 25px;
                font-weight:bold;
            }

            .arrow{
                font-size: 100px;
                font-weight:bold;
            }

            .join_us{
                padding-left:30px;
                padding-right:30px;
                padding-top:10px;
                padding-bottom:10px;
                background:black;
                color:white;
                font-size: 20px;
                font-weight: bold;
                text-decoration:none;
            }

            .join_us:hover{
                padding-left:30px;
                padding-right:30px;
                padding-top:10px;
                padding-bottom:10px;
                background:#d9a760;
                color:white;
                font-size: 20px;
                text-decoration:none;
                font-weight:bold;
            }

            .foot{
                font-size: 18px;
                color:black;
                font-weight:bold;
            }

        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row d-flex sticky-top align-items-center justify-content-between" style="background:#fff7eb;">
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
                            <span style="font-size: 40px; font-weight: bold; color:black;">Welcome to JobShake</span>
                        </div>
                        <div class="col-auto"> 
                            <img src="{{asset('image/mini.png')}}" height="100" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="background:#d9a760;">
                <div class="col-md-2 d-flex justify-content-center align-items-center">
                    <span class="arrow">&#187;</span>
                </div>
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <span class="t_line">The #1 platform for college and university students to get hired.<br>
                    The #1 platform to hire freelancers.</span>
                </div>
                <div class="col-md-2 d-flex justify-content-center align-items-center">
                    <span class="arrow">&#187;</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5" style="padding-right:0px !important; padding-left:0px !important;">
                    <img src="{{asset('image/i1.jpg')}}" alt="Image by suksao on Freepik" width="100%" height="auto"/>
                </div>
                <div class="col-md-7 align-items-center d-flex" style="padding-right:0px !important; padding-left:0px !important;">
                    <div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
                        <div class="col-md-12" style="font-size: 20px; text-align:justify; padding-left: 100px; padding-right: 100px;">
                        Join JobShake's community of job seekers, the best place for students, early career professionals, and career changers to find freelance jobs.
                        </div>
                        <div class="col-md-12 text-center" style="margin-top: 50px !important;">
                            <a href="{{route('guest.register')}}" class="join_us">Join Us</a>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="row" id="about_us" style="min-height: 100px !important;">
            </div>
            <div class="row" style="min-height: 400px !important; background:#fff7eb;">
                <div class="col-md-7" style="padding-right:0px !important; padding-left:0px !important;">
                    <div class="row" style="margin-left: 0px !important; margin-right: 0px !important; margin-top: 50px;">
                        <div class="col-md-12" style="font-size: 30px; text-align:justify; padding-left: 100px; padding-right: 100px;">
                            <h2><b>About Us</b></h2>
                        </div>
                        <div class="col-md-12 text-justify" style="font-size: 20px; margin-top: 20px !important; padding-left: 100px; padding-right: 100px;">
                            <p>Job-seeking can get stressful without the right guidance. Hence, that is why we were inspired to design a platform that would be
                                useful not only for students, but also for universities and companies that are hunting for hard-working freelancers.
                            </p>

                            <p>JobShake, is an inspiring vital link between education and future employability. With this user-friendly platform,
                                we are determined to create an enjoyable and purposely journey for the current generation. On top of it, our intergrated talent solution
                                and data management will surely be effective for universities and companies all over Malaysia.
                            </p>
                        </div>
                    </div>  
                </div>
                <div class="col-md-5" style="padding-right:0px !important; padding-left:0px !important;">
                    <img src="{{asset('image/big_jobshake.png')}}" alt="Image by suksao on Freepik" width="100%" height="auto"/>
                </div>
            </div>
            <div class="row" id="how_work" style="min-height: 100px !important; background:#fff7eb;">
            </div>
            <div class="row" style="min-height: 250px !important;">
                <div class="col-md-5" style="padding-right:0px !important; padding-left:0px !important; text-align:center;">
                    <img src="{{asset('image/how.png')}}" alt="Image by Freepik" width="auto" height="auto"/>
                </div>
                <div class="col-md-7" style="padding-right:0px !important; padding-left:0px !important;">
                    <div class="row" style="margin-left: 0px !important; margin-right: 0px !important; margin-top: 50px;">
                        <div class="col-md-12" style="font-size: 30px; text-align:justify; padding-left: 100px; padding-right: 100px;">
                            <h2><b>How It Work</b></h2>
                        </div>
                        <div class="col-md-12 text-justify" style="font-size: 20px; margin-top: 20px !important; padding-left: 100px; padding-right: 100px;">
                            <ul>
                                <li>Unlimited Part-time and Freelance jobs waiting.</li>
                                <li>One-on-one convos with employers.</li>
                            </ul>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="row" id="contact_us" style="min-height: 100px !important;">
            </div>
            <div class="row" style="min-height: 450px !important; background:#FFFFFF;">
                <div class="col-md-7" style="padding-right:0px !important; padding-left:0px !important;">
                    <div class="row" style="margin-left: 0px !important; margin-right: 0px !important; margin-top: 50px;">
                        <div class="col-md-12" style="font-size: 30px; text-align:justify; padding-left: 100px; padding-right: 100px;">
                            <h2><b>Contact Us</b></h2>
                        </div>
                        <div class="col-md-12 text-justify" style="font-size: 20px; margin-top: 20px !important; padding-left: 100px; padding-right: 100px;">
                            <p>Reach out to our respective divisions for your specific inquiries.</p>
                            <p>General Inquiry:<br>
                            hello@jobshake.com.my
                            </p>
                        </div>
                    </div>  
                </div>
                <div class="col-md-5" style="padding-right:0px !important; padding-left:0px !important; text-align:center;">
                    <img src="{{asset('image/contact.jpg')}}" alt="Image by pikisuperstar on Freepik" width="400px" height="auto"/>
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
