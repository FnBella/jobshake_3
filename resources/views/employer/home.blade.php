@extends('layouts.side_employer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 d-flex justify-content-center" style="margin-bottom:20px;">
            <a href="{{route('employer.company_profile')}}" class="dash_btn_1">Company Profile</a>
            <a href="{{route('employer.job_list')}}" class="dash_btn_2">Job List</a>
        </div>
    </div>
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
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
                    <div class="row  my-3 justify-content-center nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="col-md-5 nav-link active" id="nav-job_active-tab" data-bs-toggle="tab" data-bs-target="#nav-job_active" type="button" role="tab" aria-controls="nav-job_active" aria-selected="true">
                            <h4 style="margin-bottom: 10px !important; margin-top: 10px !important;"><b>Active</b></h4>
                        </button>
                        <button class="col-md-5 nav-link" id="nav-finish-tab" data-bs-toggle="tab" data-bs-target="#nav-finish" type="button" role="tab" aria-controls="nav-finish" aria-selected="false">
                            <h4 style="margin-bottom: 10px !important; margin-top: 10px !important;"><b>Finish</b></h4>
                        </button>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-job_active" role="tabpanel" aria-labelledby="nav-job_active-tab">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student</th>
                                                <th>Job Title</th>
                                                <th style="text-align:center;">Status</th>
                                                <th style="text-align:center;">Action</th>
                                            </tr>
                                        </thead>
                                        @if(isset($jobs_a))
                                            <tbody>
                                                @foreach($jobs_a as $job)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$job->student->full_name}}</td>
                                                        <td>{{$job->job_name}}</td>
                                                        <td style="text-align:center;">
                                                            @if($job->status == 1)
                                                                Accepted
                                                            @elseif($job->status == 2)
                                                                In Progress
                                                            @elseif($job->status == 6)
                                                                Pending For Approval
                                                            @else
                                                                No Status
                                                            @endif
                                                        </td>
                                                        <td style="text-align:center;">    
                                                            <a href="{{route('employer.view_job_details', ['id'=>$job->id])}}">
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
                                                    <td colspan="5" style="text-align: center;">No Active Job Recorded</td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-finish" role="tabpanel" aria-labelledby="nav-finish-tab">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student</th>
                                                <th>Job Title</th>
                                                <th style="text-align:center;">Status</th>
                                                <th style="text-align:center;">Action</th>
                                            </tr>
                                        </thead>
                                        @if(isset($jobs_b))
                                            <tbody>
                                                @foreach($jobs_b as $job)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$job->student->full_name}}</td>
                                                        <td>{{$job->job_name}}</td>
                                                        <td style="text-align:center;">
                                                            @if($job->status == 3)
                                                                Completed
                                                            @elseif($job->status == 5)
                                                                Rated
                                                            @else
                                                                No Status
                                                            @endif
                                                        </td>
                                                        <td style="text-align:center;">    
                                                            <a href="{{route('employer.view_job_details', ['id'=>$job->id])}}">
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
                                                    <td colspan="5" style="text-align: center;">No Completed Job Recorded</td>
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


@endsection
