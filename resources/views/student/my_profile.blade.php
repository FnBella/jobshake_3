@extends('layouts.side_student')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">

            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>My Profile</b></h3>
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
                    <div class="row my-3">
                        <div class="col-md-4">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <img src="{{asset('archieve/profile/'.$stu->profile_pic)}}" class="rounded-circle" alt="" height="200px" width="180" style="border: 1px solid black;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 align-items-center d-flex">
                            <div class="row">
                                <div class="col-auto align-items-center d-flex">
                                    <h4 style="margin-bottom: 0px !important;"><b>{{$stu->name}}</b><h4>
                                </div>
                                <div class="col-auto">
                                    <a href="{{route('student.edit_profile', ['id'=>$stu->id])}}" class="btn edit_btn">
                                        <i class="fa-solid fa-pen-to-square fa-2x" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-12" style="background:#d29d51; color:white;">
                            <h4 style="margin-bottom: 0px !important; padding:5px;"><b>My Details</b></h4>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Name</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->name}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Nationality</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->nationality}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">IC No. / Passport No.</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->ic_passport}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Gender</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->gender}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Contact No.</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->contact}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Email</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->email}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">University</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->university}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Fields</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->fields}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Course</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->course}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Semester</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->semester}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">CGPA</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->cgpa}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Skills</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2"><p>: {{$stu->skills}}<p></div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="label1">Description</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2"><p>: {{$stu->description}}<p></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-5">
                            <div class="row my-4 justify-content-center">
                                <div class="col-auto">
                                    <img src="{{asset('archieve/student_card/'.$stu->student_card)}}" alt="" height="400px" width="400" style="border: 1px solid black;">
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-5">
                            <div class="row my-4 justify-content-center">
                                <div class="col-auto image-container">
                                    <img src="{{asset('archieve/student_card/'.$stu->student_card)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
