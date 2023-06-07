@extends('layouts.side_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Employer Application List</b></h3>
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
                                <th>Person In Charge Name</th>
                                <th>Company Name</th>
                                <th>Website Link</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($employers))
                                @foreach($employers as $emp)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$emp->pic_name}}</td>
                                    <td>{{$emp->company_name}}</td>
                                    <td>
                                        <a href="{{$emp->website_link}}" target="_blank">
                                            {{$emp->website_link}}
                                        </a>
                                    </td>
                                    <td style="text-align:center;">
                                        <div class="btn-group">
                                            <a href="{{route('admin.view_emp_app', ['id'=>$emp->id])}}">
                                                <button type="button" class="btn btn-outline-primary btn-xs">
                                                    <i class="fa-solid fa-circle-info" title="View Application" style="color:black;"></i>
                                                </button>
                                            </a>
                                            {{-- &nbsp;
                                            <form action="{{route('admin.delete_uni')}}" method="POST">
                                                @csrf
                                                <input type="text" value="{{$emp->id}}" name="uni_id" hidden>
                                                <button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash-can" title="Remove Inquiry" style="color:black;"></i></button>
                                            </form> --}}
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
                            @if(isset($employers))
                                <tr>
                                    <td colspan="5">
                                        {{ $employers->links() }}
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
