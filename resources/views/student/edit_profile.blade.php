@extends('layouts.side_student')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">
            <div class="card" style="margin-top: 50px !important; margin-bottom: 80px !important;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <h3 style="margin-bottom: 0px !important;"><b>Edit My Profile</b></h3>
                </div>
                

                <form method="POST" action="{{ route('student.update_profile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body" style="padding: 0px !important;">
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
                        <div class="row" style="margin-left: 0px !important; margin-right: 0px !important;">
                            <div class="col-md-6">
                                <div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 30px;">
                                    <div class="col-auto">
                                        <span class="m_title">My Profile Section</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">Full Name</label>

                                    <div class="col-md-6">
                                        <input type="text" name="student_id" value="{{$stu->id}}" hidden>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $stu->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nationality" class="col-md-4 col-form-label text-md-end">Nationality</label>

                                    <div class="col-md-6">
                                        <input id="nationality" type="text" class="form-control" name="nationality" value="{{$stu->nationality}}" placeholder="Malaysian" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ic_passport" class="col-md-4 col-form-label text-md-end">IC Number / Passport Number</label>

                                    <div class="col-md-6">
                                        <input id="ic_passport" type="text" class="form-control" name="ic_passport" placeholder="990101-01-0001" value="{{$stu->ic_passport}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contact" class="col-md-4 col-form-label text-md-end">Contact Number</label>

                                    <div class="col-md-6">
                                        <input id="contact" type="text" class="form-control" name="contact" placeholder="012-123 4567" value="{{$stu->contact}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>

                                    <div class="col-md-6">
                                        <select name="gender" id="gender" class="form-select" required>
                                            <option value="{{$stu->gender}}">{{$stu->gender}}</option>
                                            <option value="">Please Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="university" class="col-md-4 col-form-label text-md-end">University</label>

                                    <div class="col-md-6">
                                        <input id="university" type="text" class="form-control" name="university" value="{{$stu->university}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="course" class="col-md-4 col-form-label text-md-end">Course</label>

                                    <div class="col-md-6">
                                        <input id="course" type="text" class="form-control" name="course" placeholder="Software Engineering" value="{{$stu->course}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="semester" class="col-md-4 col-form-label text-md-end">Semester</label>

                                    <div class="col-md-6">
                                        <input id="semester" type="text" class="form-control" name="semester" placeholder="5" value="{{$stu->semester}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="cgpa" class="col-md-4 col-form-label text-md-end">CGPA</label>

                                    <div class="col-md-6">
                                        <input id="cgpa" type="text" class="form-control" name="cgpa" placeholder="4.00" value="{{$stu->cgpa}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fields" class="col-md-4 col-form-label text-md-end">Fields</label>

                                    <div class="col-md-6">
                                        <select name="fields" id="fields" class="form-select" required>
                                            <option value="{{$stu->fields}}">{{$stu->fields}}</option>
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
                                    <label for="skills" class="col-md-4 col-form-label text-md-end">Skills</label>

                                    <div class="col-md-6">
                                        <textarea id="skills" class="form-control" rows="5" name="skills" placeholder="Example in IT, programming language, C++, PHP, HTML, CSS...." required autofocus>{{$stu->skills}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-md-4 col-form-label text-md-end">About You</label>

                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" rows="5" name="description" placeholder="Summary about yourself...." required autofocus>{{$stu->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 30px;">
                                    <div class="col-auto">
                                        <span class="m_title">Student Card / Profile Picture Section</span>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-auto">
                                        <img src="{{asset('archieve/profile/'.$stu->profile_pic)}}" class="rounded-circle" alt="" height="200px" width="200" style="border: 1px solid black;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile_pic" class="col-md-4 col-form-label text-md-end">Profile Picture<br>(Format: JPG/JPEG/PNG)</label>

                                    <div class="col-md-6">
                                        <input id="profile_pic" type="file" class="form-control" name="profile_pic" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-auto image-container">
                                        <img src="{{asset('archieve/student_card/'.$stu->student_card)}}" alt="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="student_card" class="col-md-4 col-form-label text-md-end">Student Card<br>(Format: JPG/JPEG/PNG)</label>

                                    <div class="col-md-6">
                                        <input id="student_card" type="file" class="form-control" name="student_card" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-auto">
                                <button type="submit" class="d_menu">
                                    Update
                                </button>
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-auto">
                                <button type="reset" class="d_menu2">
                                    Cancel
                                </button>
                            </div>
                        </div> -->

                        <!-- <div class="container">
                            <div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button type="reset" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div> -->

                        <div class="button-container">
                            <button type="submit" class="updatebutton">Update</button>
                            <button type="button" class="cancelbutton" onclick="window.location.href='/student/my_profile'">Cancel</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
