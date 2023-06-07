@extends('layouts.side_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Student Application Details</b></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                    <div class="label1">Fields</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$stu->fields}}</div>
                                </div>
                            </div>
                            <div class="row mb-4">
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
                        <div class="col-md-5">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <img src="{{asset('archieve/profile/'.$stu->profile_pic)}}" alt="" height="400px" width="auto">
                                </div>
                                <!-- <div class="col-auto image-container">
                                    <img src="{{asset('archieve/profile/'.$stu->profile_pic)}}" alt="">
                                </div> -->
                            </div>
                            <div class="row my-4 justify-content-center">
                                <div class="col-auto">
                                    <a href="{{asset('archieve/student_card/'.$stu->student_card)}}" class="d_new1" target="_blank">
                                        View Student Card
                                    </a>
                                </div>
                            </div>
                            <div class="row my-4 justify-content-center">
                                <div class="col-auto">
                                    <div class="btn-group">
                                        <form action="{{route('admin.app_rej_stu')}}" method="POST">
                                            @csrf
                                            <input type="text" value="{{$stu->id}}" name="student_id" hidden>
                                            <input type="text" value="approve" name="status" hidden>
                                            <button type="submit" class="approve" onclick="return confirm('Are you sure want to approve?')"><i class="fa-solid fa-person-circle-check fa-3x" title="Approve Student"></i></button>
                                        </form>
                                        &nbsp;
                                        &nbsp;
                                        <form action="{{route('admin.app_rej_stu')}}" method="POST">
                                            @csrf
                                            <input type="text" value="{{$stu->id}}" name="student_id" hidden>
                                            <input type="text" value="reject" name="status" hidden>
                                            <button type="submit" class="reject" onclick="return confirm('Are you sure want to reject?')"><i class="fa-solid fa-person-circle-xmark fa-3x" title="Reject Student"></i></button>
                                        </form>
                                    </div>
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
