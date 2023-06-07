@extends('layouts.side_employer')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">

            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Company Profile</b></h3>
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
                                    <img src="{{asset('archieve/company_logo/'.$emp->company_logo)}}" class="rounded-circle" alt="" height="200px" width="200" style="border: 1px solid black;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 align-items-center d-flex">
                            <div class="row">
                                <div class="col-auto align-items-center d-flex">
                                    <h4 style="margin-bottom: 0px !important;"><b>{{$emp->company_name}}</b><h4>
                                </div>
                                <div class="col-auto">
                                    <a href="{{route('employer.edit_profile', ['id'=>$emp->id])}}" class="btn edit_btn">
                                        <i class="fa-solid fa-pen-to-square fa-2x" title="Edit Company Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-md-12" style="background:#d29d51; color:white;">
                            <h4 style="margin-bottom: 0px !important; padding:5px;"><b>Company Details</b></h4>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Company Name</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->company_name}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Person In Charge Name</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->pic_name}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Contact Number</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->contact_number}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Email</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->email}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Company Field</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->fields}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Company Website Link</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->website_link}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Company SSM Number</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->ssm_number}}</div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="label1">Company Address</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2"><p>: {{$emp->address}}<p></div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <div class="label1">Description</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2"><p>: {{$emp->description}}<p></div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="row my-4 justify-content-center">
                                <div class="col-auto">
                                    <a href="{{asset('archieve/company_ssm/'.$emp->company_ssm)}}" class="d_new1" target="_blank">
                                        View Company SSM
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-5">
                            <div class="row my-4 justify-content-center">
                                <div class="col-auto">
                                    <a href="{{asset('archieve/company_ssm/'.$emp->company_ssm)}}" class="d_new1" target="_blank">
                                        View Company SSM
                                    </a>
                                </div>
                            </div>
                        </div> -->

                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
