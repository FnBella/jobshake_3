@extends('layouts.side_employer')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">

            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>View Student Profile</b></h3>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('employer.student_list')}}" class="d_new">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background:#fff7eb;">
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
                    <div class="row my-3" style="padding: 30px; background: white; margin: 30px; border:2px solid black; border-radius: 20px;">
                        <div class="col-md-4">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <img src="{{asset('archieve/profile/'.$stu->profile_pic)}}" alt="" height="250px" width="250" style="border: 2px solid black;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 align-items-center d-flex">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Full Name : {{$stu->full_name}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>University : {{$stu->university}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Fields : {{$stu->fields}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Course : {{$stu->course}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Semester : {{$stu->semester}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>CGPA : {{$stu->cgpa}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span style="text-align:justify; font-style: italic;">Skills : "{{$stu->skills}}"</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span style="text-align:justify; font-style: italic;"> Description : "{{$stu->description}}"</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <div class="row justify-content-center">
                                        <div class="col-auto">
                                            <button type="button" class="d_new2" id="chat_stu" data-bs-toggle="modal" data-bs-target="#chatModal" data-stu_name="{{$stu->full_name}}" data-stu_id="{{$stu->id}}" data-emp_id="{{Auth::user()->id}}">
                                                Chat
                                            </button>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <a href="" class="d_new2">Request</a>-->
                                            <!-- Button trigger modal -->
                                            @if (session('success'))
                                                <button type="button" class="d_new2" id="request_job" data-bs-toggle="modal" data-bs-target="#requestModal" data-stu_id="{{$stu->id}}" data-emp_id="{{Auth::user()->id}}" disabled>
                                                    Requested
                                                </button>
                                            @else
                                                <button type="button" class="d_new2" id="request_job" data-bs-toggle="modal" data-bs-target="#requestModal" data-stu_id="{{$stu->id}}" data-emp_id="{{Auth::user()->id}}">
                                                    Request
                                                </button>
                                            @endif
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
</div>


<!-- Modal Request -->
<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <b>Job Description</b>
                </h5>
            </div>
            <form action="{{route('employer.submit_req_job')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row my-3 justify-content-center">
                            <label for="job_title" class="col-md-2 col-form-label">Job Title</label>

                            <div class="col-md-8">
                                <input type="text" name="student_id" id="stu_id" hidden>
                                <input type="text" name="employer_id" id="emp_id" hidden>
                                <input id="job_title" type="text" class="form-control" name="job_title" placeholder="Web Development" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <label for="job_details" class="col-md-2 col-form-label">Job Details</label>

                            <div class="col-md-8">
                                <textarea id="job_details" class="form-control" rows="10" name="job_details" placeholder="Web development of E-Commerce system......" required autofocus></textarea>
                            </div>
                        </div>
                        <div class="row my-3 justify-content-center">
                            <label for="job_payment" class="col-md-2 col-form-label">Job Payment (RM)</label>

                            <div class="col-md-8">
                                <input id="job_payment" type="text" class="form-control" name="job_payment" placeholder="600.00" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <label for="start_date" class="col-md-2 col-form-label">Job Start Date</label>

                            <div class="col-md-3">
                                <input id="start_date" type="date" class="form-control" name="start_date" required autofocus>
                            </div>
                            <label for="end_date" class="col-md-2 col-form-label">Job End Date</label>

                            <div class="col-md-3">
                                <input id="end_date" type="date" class="form-control" name="end_date" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center align-items-center">
                            <label for="job_file" class="col-md-2 col-form-label">Job Task File<br> (Format: Zip/PDF)</label>

                            <div class="col-md-8">
                                <input id="job_file" type="file" class="form-control" name="job_file" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirm</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Chat -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <b class="student_name"></b>
                    <input type="text" name="student_id" id="stu_id" hidden>
                    <input type="text" name="employer_id" id="emp_id" hidden>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <form action="{{route('employer.submit_req_job')}}" method="POST" enctype="multipart/form-data"> -->
                <!-- @csrf -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row my-3 justify-content-center">
                            <div class="col-md-12" id="chat_display" style="height: 300px !important; background: #138d75;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="input-group">
                        <input type="text" id="new_msg" class="form-control" name="message" placeholder="Message....." required autofocus>
                        <button type="button" id="send_msg" class="btn btn-success">Send</button>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    $(document).on('click', '#request_job', function(){

        var stu_id = $(this).attr('data-stu_id');
        var emp_id = $(this).attr('data-emp_id');

        console.log(stu_id);
        console.log(emp_id);

        $('#stu_id').val(stu_id);
        $('#emp_id').val(emp_id);

    });

    $(document).on('click', '#chat_stu', function(){

        var stu_id = $(this).attr('data-stu_id');
        var emp_id = $(this).attr('data-emp_id');
        var stu_name = $(this).attr('data-stu_name');

        console.log(stu_id);
        console.log(emp_id);
        console.log(stu_name);

        $('#stu_id').val(stu_id);
        $('#emp_id').val(emp_id);
        $('.student_name').append(stu_name);

    });

    
    $(document).on('click', '#send_msg', function(){

        var stu_id = $('#stu_id').val();
        var emp_id = $('#emp_id').val();
        var new_msg = $('#new_msg').val();

        console.log(stu_id);
        console.log(emp_id);
        console.log(new_msg);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'GET',
            url:'{{route("send-from-req")}}',
            data: {
                'stu_id' : stu_id,
                'emp_id' : emp_id,
                'new_msg' : new_msg,
            },
            dataType: 'json',
            success:function(data) {
                console.log(data);

                var dis = '';

                dis += '<div class="row justify-content-end">';
                dis +=      '<div class="col-md-6" style="padding: 10px; background: white; margin: 10px; border-radius: 10px;">';
                dis +=          '<span><b>'+data.emp_name+'</b><span>';
                dis +=              '<p style="text-align:justify;">'+data.message+'</p>';
                dis +=          '<small>'+data.send_time+'</small>';
                dis +=      '</div>';
                dis += '</div>';

                $('#chat_display').append(dis);

            },
            
            error: function (msg) {
                console.log(msg);
                var errors = msg.responseJSON;
            }

        });

    });

</script>

@endsection
