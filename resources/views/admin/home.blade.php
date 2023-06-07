@extends('layouts.side_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Approval Overview</b></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success justify-content-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger justify-content-center">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="row my-3 justify-content-center">
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-user-tie fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countPE}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Request Employer</b></h3>
                        </div>
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-user-graduate fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countPS}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Request Student</b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>User Overview</b></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success justify-content-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger justify-content-center">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="row my-3 justify-content-center">
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-users fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countU}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Approved User</b></h3>
                        </div>
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-user-tie fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countE}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Approved Employer</b></h3>
                        </div>
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-user-graduate fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countS}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Approved Student</b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Job Overview</b></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success justify-content-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger justify-content-center">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="row my-3 justify-content-center">
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-rectangle-list fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countAJ}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Job Record</b></h3>
                        </div>
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-list-check fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countCJ}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Job Complete</b></h3>
                        </div>
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-bars-progress fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countXJ}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Job Active</b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Rejected Overview</b></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success justify-content-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger justify-content-center">
                            {{ session('failed') }}
                        </div>
                    @endif
                    <div class="row my-3 justify-content-center">
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-user-tie fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countRE}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Rejected Employer</b></h3>
                        </div>
                        <div class="col-auto" style="padding: 20px 20px 10px 20px; background: #d9a760; color:white; margin: 30px; border-radius: 20px; text-align:center;">
                            <i class="fa-solid fa-user-graduate fa-4x" style="margin-right: 30px;"></i><span style="font-size: 54px; font-weight: bold;">{{$countRS}}</span>
                            <h3 style="margin-bottom:10px !important; margin-top: 10px !important;"><b>Total Rejected Student</b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
