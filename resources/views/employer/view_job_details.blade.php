@extends('layouts.side_employer')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">

            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>View Job Details</b></h3>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('employer.job_list')}}" class="d_new">Back</a>
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
                        <div class="col-md-8 align-items-center d-flex">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Job Title : {{$job->job_name}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Student Name : {{$job->student->full_name}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Student Email : {{$job->student->email}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Payment : RM {{$job->payment}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Task Start Date : {{$job->start}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Task End Date : {{$job->end}}</span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Job File : </span>
                                    <a href="{{asset('archieve/job/'.$job->job_file)}}" class="d_new1" target="_blank">
                                        View Job File
                                    </a>
                                </div>
                                @if($job->return_job_file != null)
                                    <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                        <span>Return Completed Job File : </span>
                                        <a href="{{asset('archieve/return_job/'.$job->return_job_file)}}" class="d_new1" target="_blank">
                                            View Completed Job File
                                        </a>
                                    </div>
                                @endif
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>
                                        Status : 
                                        @if($job->status == 0)
                                            Request
                                        @elseif($job->status == 1)
                                            Approve
                                        @elseif($job->status == 2)
                                            In Progress
                                        @elseif($job->status == 3)
                                            Completed
                                        @elseif($job->status == 6)
                                            Pending For Approval
                                        @elseif($job->status == 5)
                                            Rated
                                        @else
                                            No Status
                                        @endif
                                    </span>
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <span>Job Description : </span><span style="text-align:justify; font-style: italic;">"{{$job->job_details}}"</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row justify-content-center">
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <div class="row justify-content-center">
                                        <div class="col-auto">
                                            <div class="btn-group">
                                                @if($job->status == 0)
                                                    <button type="button" class="btn btn-outline-primary btn-xs" style="border-radius: 0.375rem !important;" data-bs-toggle="modal" data-bs-target="#editjobModal">
                                                        <i class="fa-solid fa-pen-to-square" title="Edit" style="color:black;"></i>
                                                    </button>
                                                @endif
                                                &nbsp;
                                                @if($job->status == 0)
                                                <form action="{{route('employer.delete_job_req')}}" method="POST">
                                                    @csrf
                                                    <input type="text" value="{{$job->id}}" name="job_id" hidden>
                                                    <button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash-can" title="Remove Job Request" style="color:black;"></i></button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto my-3">
                                    <img src="{{asset('archieve/profile/'.$job->student->profile_pic)}}" alt="" height="250px" width="250" style="border: 2px solid black;">
                                </div>
                                <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                    <div class="row justify-content-center">
                                        @if($job->status == 6)
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ratecompleteModal"><i class="fa-solid fa-circle-check fa-2x" title="Approved & Completed"></i></button>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#remarkrejectModal"><i class="fa-solid fa-circle-xmark fa-2x" title="Rejected & Redo"></i></button>
                                            </div>
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


<!-- Modal Request -->
<div class="modal fade" id="editjobModal" tabindex="-1" aria-labelledby="editjobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <b>Edit Job Details</b>
                </h5>
            </div>
            <form action="{{route('employer.update_req_job')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row my-3 justify-content-center">
                            <label for="job_title" class="col-md-2 col-form-label">Job Title</label>

                            <div class="col-md-8">
                                <input type="text" name="job_id" id="job_id" value="{{$job->id}}" hidden>
                                <input id="job_title" type="text" class="form-control" name="job_title" placeholder="Web Development" value="{{$job->job_name}}" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <label for="job_details" class="col-md-2 col-form-label">Job Details</label>

                            <div class="col-md-8">
                                <textarea id="job_details" class="form-control" rows="10" name="job_details" placeholder="Web development of E-Commerce system......" required autofocus>{{$job->job_details}}</textarea>
                            </div>
                        </div>
                        <div class="row my-3 justify-content-center">
                            <label for="job_payment" class="col-md-2 col-form-label">Job Payment (RM)</label>

                            <div class="col-md-8">
                                <input id="job_payment" type="text" class="form-control" name="job_payment" placeholder="600.00" value="{{$job->payment}}" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <label for="start_date" class="col-md-2 col-form-label">Job Start Date</label>

                            <div class="col-md-3">
                                <input id="start_date" type="date" class="form-control" name="start_date" value="{{date('Y-m-d',strtotime($job->start_date))}}" required autofocus>
                            </div>
                            <label for="end_date" class="col-md-2 col-form-label">Job End Date</label>

                            <div class="col-md-3">
                                <input id="end_date" type="date" class="form-control" name="end_date" value="{{date('Y-m-d',strtotime($job->end_date))}}" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3 justify-content-center align-items-center">
                            <label for="job_file" class="col-md-2 col-form-label">New Job Task File<br> (Format: Zip/PDF)</label>

                            <div class="col-md-8">
                                <input id="job_file" type="file" class="form-control" name="job_file" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Rate & Complete / Remark & Reject-->
@if($job->status == 6)
    <div class="modal fade" id="ratecompleteModal" tabindex="-1" aria-labelledby="ratecompleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Rate Student And Mark Completed Job
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('employer.submit_rate_complete')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row my-3 justify-content-center" style="margin-left:0px !important; margin-right:0px !important;">
                                <div class="col-md-7">
                                    <div class="row mb-3">
                                        <input type="text" name="student_id" value="{{$job->student_id}}" hidden>
                                        <input type="text" name="job_id" value="{{$job->id}}" hidden>
                                        <label for="feedback" class="col-md-2 col-form-label">Feedback : </label>

                                        <div class="col-md-10">
                                            <textarea id="feedback" class="form-control" rows="6" name="feedback" placeholder="Please leave some feedback for improvement...." required autofocus></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="feedback" class="col-md-2 col-form-label">Rating : </label>

                                        <div class="col-md-8">
                                            <span class="star-rating star-5">
                                                <input type="radio" name="rating" value="1"><i></i>
                                                <input type="radio" name="rating" value="2"><i></i>
                                                <input type="radio" name="rating" value="3"><i></i>
                                                <input type="radio" name="rating" value="4"><i></i>
                                                <input type="radio" name="rating" value="5"><i></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex justify-content-center">
                                    <img src="{{asset('archieve/profile/'.$job->student->profile_pic)}}" alt="" height="250px" width="250" style="border: 2px solid black;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Rate & Complete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="remarkrejectModal" tabindex="-1" aria-labelledby="remarkrejectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Reject Job File And Remark
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('employer.submit_remark_reject')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row my-3 justify-content-center" style="margin-left:0px !important; margin-right:0px !important;">
                                <div class="col-md-7">
                                    <div class="row mb-3">
                                        <input type="text" name="student_id" value="{{$job->student_id}}" hidden>
                                        <input type="text" name="job_id" value="{{$job->id}}" hidden>
                                        <label for="remark" class="col-md-2 col-form-label">Remark : </label>

                                        <div class="col-md-10">
                                            <textarea id="remark" class="form-control" rows="6" name="remark" placeholder="Please leave remark here for redo or correction...." required autofocus></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex justify-content-center">
                                    <img src="{{asset('archieve/profile/'.$job->student->profile_pic)}}" alt="" height="250px" width="250" style="border: 2px solid black;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Remark & Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>



</script>

@endsection
