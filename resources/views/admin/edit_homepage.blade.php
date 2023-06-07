@extends('layouts.side_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Edit Home Page Content</b></h3>
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
                        @if (session('error'))
                            <div class="alert alert-danger justify-content-center">
                                {{ session('error') }}
                            </div>
                        @endif
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Natonality</th>
                                <th>University</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($students))
                                @foreach($students as $stu)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$stu->name}}</td>
                                    <td>{{$stu->nationality}}</td>
                                    <td>{{$stu->university}}</td>
                                    <td style="text-align:center;">
                                        <div class="btn-group">
                                            <a href="{{route('admin.view_stu_details', ['id'=>$stu->id])}}">
                                                <button type="button" class="btn btn-outline-primary btn-xs">
                                                    <i class="fa-solid fa-circle-info" title="View Student" style="color:black;"></i>
                                                </button>
                                            </a>
                                            &nbsp;
                                            <form action="{{route('admin.remove_stu')}}" method="POST">
                                                @csrf
                                                <input type="text" value="{{$stu->id}}" name="stu_id" hidden>
                                                <button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure want to remove?')"><i class="fa-solid fa-trash-can" title="Remove Inquiry" style="color:black;"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" style="text-align:center;">No University Recorded</td>
                                </tr>
                            @endif
                        </tbody>
                        <tbody>
                            @if(isset($students))
                                <tr>
                                    <td colspan="5">
                                        {{ $students->links() }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
