@extends('layouts.side_student')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">

            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>My Job</b></h3>
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
                    <div class="row  my-3 justify-content-center nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="col-md-5 nav-link active" id="nav-joined-tab" data-bs-toggle="tab" data-bs-target="#nav-joined" type="button" role="tab" aria-controls="nav-joined" aria-selected="true">
                            <h4 style="margin-bottom: 10px !important; margin-top: 10px !important;"><b>Joined Company</b></h4>
                        </button>
                        <button class="col-md-5 nav-link" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="false">
                            <h4 style="margin-bottom: 10px !important; margin-top: 10px !important;"><b>Request</b></h4>
                        </button>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-joined" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Company</th>
                                                <th>Job Title</th>
                                                <th style="text-align:center;">Status</th>
                                                <th style="text-align:center;">Action</th>
                                            </tr>
                                        </thead>
                                        @if(isset($jobs))
                                            <tbody>
                                                @foreach($jobs as $job)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$job->employer->company_name}}</td>
                                                        <td>{{$job->job_name}}</td>
                                                        <td style="text-align:center;"> 
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
                                                        </td>
                                                        <td style="text-align:center;">    
                                                            <a href="{{route('student.view_job_details', ['id'=>$job->id])}}">
                                                                <button type="button" class="btn btn-outline-primary btn-xs">
                                                                    <i class="fa-solid fa-circle-info" title="View Job" style="color:black;"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        @else
                                            <tbody>
                                                <tr>
                                                    <td colspan="5" style="text-align: center;">No Joined Company Recorded</td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-request" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Company</th>
                                                <th>Job Title</th>
                                                <th style="text-align:center;">Action</th>
                                            </tr>
                                        </thead>
                                        @if(isset($requests))
                                            <tbody>
                                                @foreach($requests as $req)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$req->jobs->employer->company_name}}</td>
                                                        <td>{{$req->jobs->job_name}}</td>
                                                        <td style="text-align:center;">    
                                                            <button type="button" class="btn btn-outline-primary btn-xs" data-bs-toggle="modal" data-bs-target="#jobreqModal{{$req->id}}">
                                                                <i class="fa-solid fa-circle-info" title="View Job" style="color:black;"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        @else
                                            <tbody>
                                                <tr>
                                                    <td colspan="4" style="text-align: center;">No Request From Company</td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@if(isset($requests))
    @foreach($requests as $req)
        <!-- Modal Request -->
        <div class="modal fade" id="jobreqModal{{$req->id}}" tabindex="-1" aria-labelledby="jobreqModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <b>View Job Request</b>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row my-3 justify-content-center">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12" style="font-size: 18px; padding: 10px;">
                                            <span>Company Name : {{$req->jobs->employer->company_name}}</span>
                                        </div>
                                        <div class="col-md-12" style="font-size: 18px; padding: 10px;">
                                            <span>Company Contact No. : {{$req->jobs->employer->contact_number}}</span>
                                        </div>
                                        <div class="col-md-12" style="font-size: 18px; padding: 10px;">
                                            <span>Job Title : {{$req->jobs->job_name}}</span>
                                        </div>
                                        <div class="col-md-12" style="font-size: 18px; padding: 10px;">
                                            <span>Job Details : {{$req->jobs->job_details}}</span>
                                        </div>
                                        <div class="col-md-12" style="font-size: 18px; padding: 10px;">
                                            <span>Task Start Date : {{$req->jobs->start_date->format('d-m-Y')}}</span>
                                        </div>
                                        <div class="col-md-12" style="font-size: 18px; padding: 10px;">
                                            <span>Task End Date : {{$req->jobs->end_date->format('d-m-Y')}}</span>
                                        </div>
                                        <div class="col-md-12" style="font-size: 18px; padding: 10px;">
                                            <span>Payment : RM {{$req->jobs->payment}}</span>
                                        </div>
                                        <div class="col-md-12" style="font-size: 18px; padding: 10px;">
                                            <span>Job File : </span>
                                            <a href="{{asset('archieve/job/'.$req->jobs->job_file)}}" class="d_new1" target="_blank">
                                                View Job File
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row justify-content-center">
                                        <div class="col-auto my-3">
                                            <img src="{{asset('archieve/company_logo/'.$req->jobs->employer->company_logo)}}" alt="" height="250px" width="250" style="border: 2px solid black;">
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <div class="btn-group">
                                                <form action="{{route('student.acc_rej_job_req')}}" method="POST">
                                                    @csrf
                                                    <input type="text" value="{{$req->id}}" name="req_id" hidden>
                                                    <input type="text" value="1" name="accept_reject" hidden>
                                                    <button type="submit" class="btn btn-success" style="border-radius: 0.375rem !important;">Accept</button>
                                                </form>
                                                &nbsp;
                                                &nbsp;
                                                <form action="{{route('student.acc_rej_job_req')}}" method="POST">
                                                    @csrf
                                                    <input type="text" value="{{$req->id}}" name="req_id" hidden>
                                                    <input type="text" value="0" name="accept_reject" hidden>
                                                    <button type="submit" class="btn btn-danger" style="border-radius: 0.375rem !important;">Reject</button>
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
    @endforeach
@endif


@endsection
