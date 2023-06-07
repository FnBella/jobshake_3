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

            .red-asterisk {
                color: red;
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
                        <div class="card-header text-center">
                            <h2 style="margin-bottom: 0px !important;"><b>Register Employer Account</b></h2>
                        </div>

                        <form method="POST" action="{{ route('emp.submit') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" style="padding: 0px !important;">
                                @if (session('registered'))
                                    <div class="alert alert-success justify-content-center">
                                        {{ session('registered') }}
                                    </div>
                                @endif
                                <div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
                                    <div class="col-md-6">
                                        <div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 30px;">
                                            <div class="col-auto">
                                                <span class="m_title">Company Profile Section</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="company_name" class="col-md-4 col-form-label text-md-end">Company Name:<span class="red-asterisk"> *</span></label>

                                            <div class="col-md-6">
                                                <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Example Sdn Bhd" required autofocus>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="contact_number" class="col-md-4 col-form-label text-md-end">Contact Number:<span class="red-asterisk"> *</span></label>

                                            <div class="col-md-6">
                                                <input id="contact_number" type="text" class="form-control" name="contact_number" placeholder="016-123 4567" value="{{ old('contact_number') }}" required autofocus>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="fields" class="col-md-4 col-form-label text-md-end">Company Field:<span class="red-asterisk"> *</span></label>

                                            <div class="col-md-6">
                                                <select name="fields" id="fields" class="form-select" required>
                                                    <option value="">Please Select Field</option>
                                                    <option value="Accounting/Finance">Accounting/Finance</option>
                                                    <option value="Admin/Human Resource">Admin/Human Resource</option>
                                                    <option value="Sales/Marketing">Sales/Marketing</option>
                                                    <option value="Arts/Media/Communication">Arts/Media/Communication</option>
                                                    <option value="Services">Services</option>
                                                    <option value="Hotel/Restaurant">Hotel/Restaurant</option>
                                                    <option value="Education/Training">Education/Training</option>
                                                    <option value="Computer/Information Technology">Computer/Information Technology</option>
                                                    <option value="Engineering">Engineering</option>
                                                    <option value="Manufacturing">Manufacturing</option>
                                                    <option value="Building/Construction">Building/Construction</option>
                                                    <option value="Sciences">Sciences</option>
                                                    <option value="Healthcare">Healthcare</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="website_link" class="col-md-4 col-form-label text-md-end">Company Website Link</label>

                                            <div class="col-md-6">
                                                <input id="website_link" type="text" class="form-control" name="website_link" placeholder="www.google.com" value="{{ old('website_link') }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ssm_number" class="col-md-4 col-form-label text-md-end">SSM Number:<span class="red-asterisk"> *</span></label>

                                            <div class="col-md-6">
                                                <input id="ssm_number" type="text" class="form-control" name="ssm_number" placeholder="1312525-A" value="{{ old('ssm_number') }}" required autofocus>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="address" class="col-md-4 col-form-label text-md-end">Company Address:<span class="red-asterisk">*</span></label>

                                            <div class="col-md-6">
                                                <textarea id="address" class="form-control" rows="5" name="address" placeholder="Your company address...." required autofocus>{{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="company_logo" class="col-md-4 col-form-label text-md-end">Company Logo<br>(Format: JPG/JPEG/PNG):<span class="red-asterisk"> *</span></label>

                                            <div class="col-md-6">
                                                <input id="company_logo" type="file" class="form-control" name="company_logo" required autofocus>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="company_ssm" class="col-md-4 col-form-label text-md-end">Company SSM<br>(Format: PDF):<span class="red-asterisk"> *</span></label>

                                            <div class="col-md-6">
                                                <input id="company_ssm" type="file" class="form-control" name="company_ssm" required autofocus>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="col-md-4 col-form-label text-md-end">Company Description:<span class="red-asterisk"> *</span></label>

                                            <div class="col-md-6">
                                                <textarea id="description" class="form-control" rows="5" name="description" placeholder="Summary about your company...." required autofocus>{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 30px;">
                                            <div class="col-auto">
                                                <span class="m_title">Employer Account Section</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">Person In Charge Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                         <div class="col-md-12" style="font-size: 16px; text-align:justify; padding-left: 100px; padding-right: 100px;padding-top: 50px;">
                                                 <span style="font-size: 16px; font-weight:bold;"> Notes: </span>
                                                 <div style="font-size: 14px;padding-top: 10px;padding-left: 10px; padding-right: 10px;border-width:2px; border-style:solid; border-color:#FF0000;">
                                                    <ul>
                                                        <li>All fields in Employer Account Section are required.</li>
                                                        <li>All<span style="color:red;"> * </span>fields are required.</li>
                                                        <li>Passwords must be at least eight characters long.</li>
                                                        <li>Company Logo file format: JPG/JPEG/PNG only.</li>
                                                        <li>Company SSM file format: PDF only.</li>
                                                    </ul>  
                                                 </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
                                    <div class="col-auto">
                                        <button type="submit" class="d_menu">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
