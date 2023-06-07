@extends('layouts.side_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Employer / Company Details</b></h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-md-8">
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
                                    <div class="label1">Company Name</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->company_name}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="label1">Person In Charge Contact No.</div>
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
                                    <div class="label1">Website Link</div>
                                </div>
                                <div class="col-md-8">
                                    <div class="label2">: {{$emp->website_link}}</div>
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
                        </div>
                        <div class="col-md-4">
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <img src="{{asset('archieve/company_logo/'.$emp->company_logo)}}" alt="" height="300px" width="auto">
                                </div>
                            </div>
                            <div class="row my-4 justify-content-center" style="padding-top:50px;">
                                <div class="col-auto">
                                    <a href="{{asset('archieve/company_ssm/'.$emp->company_ssm)}}" class="d_new1" target="_blank">
                                        View Company SSM
                                    </a>
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
