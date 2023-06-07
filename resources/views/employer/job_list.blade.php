@extends('layouts.side_employer')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">

            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Job List</b></h3>
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
                    <div class="row  my-3 justify-content-center">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Title</th>
                                        <th style="text-align:center;">Student Name</th>
                                        <th style="text-align:center;">Task Start Date</th>
                                        <th style="text-align:center;">Task End Date</th>
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;">Action</th>
                                    </tr>
                                </thead>
                                @if(isset($jobs))
                                    <tbody>
                                        @foreach($jobs as $job)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$job->job_name}}</td>
                                                <td style="text-align:center;">{{$job->student->full_name}}</td>
                                                <td style="text-align:center;">{{$job->start}}</td>
                                                <td style="text-align:center;">{{$job->end}}</td>
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
                                            <td colspan="7" style="text-align: center;">No Job / Job Request Recorded</td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                    @if(isset($jobs))
                        <div class="row justify-content-center" style="margin-top: 50px !important;">
                            <div class="col-auto">
                                {{ $jobs->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
