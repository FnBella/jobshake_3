@extends('layouts.side_employer')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">
            <div class="card" style="margin-top: 50px !important; margin-bottom: 80px !important;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <h3 style="margin-bottom: 0px !important;"><b>Edit Company Profile</b></h3>
                </div>

                <form method="POST" action="{{ route('employer.update_profile') }}" enctype="multipart/form-data">
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
                                        <span class="m_title">Company Profile Section</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="company_name" class="col-md-4 col-form-label text-md-end">Company Name</label>

                                    <div class="col-md-6">
                                        <input type="text" name="employer_id" value="{{$emp->id}}" hidden>
                                        <input id="company_name" type="text" class="form-control" name="company_name" value="{{ $emp->company_name }}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="pic_name" class="col-md-4 col-form-label text-md-end">Person In Charge Name</label>

                                    <div class="col-md-6">
                                        <input id="pic_name" type="text" class="form-control" name="pic_name" value="{{$emp->pic_name}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contact_number" class="col-md-4 col-form-label text-md-end">Contact Number</label>

                                    <div class="col-md-6">
                                        <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{$emp->contact_number}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fields" class="col-md-4 col-form-label text-md-end">Company Field</label>

                                    <div class="col-md-6">
                                        <select name="fields" id="fields" class="form-select" required>
                                            <option value="{{$emp->fields}}">{{$emp->fields}}</option>
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
                                    <label for="website_link" class="col-md-4 col-form-label text-md-end">Company Website Link</label>

                                    <div class="col-md-6">
                                        <input id="website_link" type="text" class="form-control" name="website_link" value="{{$emp->website_link}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="ssm_number" class="col-md-4 col-form-label text-md-end">Company SSM Number</label>

                                    <div class="col-md-6">
                                        <input id="ssm_number" type="text" class="form-control" name="ssm_number" value="{{$emp->ssm_number}}" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                                    <div class="col-md-6">
                                        <textarea id="address" class="form-control" rows="5" name="address" placeholder="Your company address...." required autofocus>{{$emp->address}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="col-md-4 col-form-label text-md-end">About Company</label>

                                    <div class="col-md-6">
                                        <textarea id="description" class="form-control" rows="5" name="description" placeholder="Summary about your company...." required autofocus>{{$emp->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 30px;">
                                    <div class="col-auto">
                                        <span class="m_title">Company Logo / Company SSM Section</span>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-auto">
                                        <img src="{{asset('archieve/company_logo/'.$emp->company_logo)}}" class="rounded-circle" alt="" height="200px" width="200" style="border: 1px solid black;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="company_logo" class="col-md-4 col-form-label text-md-end">Company Logo<br>(Format: JPG/JPEG/PNG)</label>

                                    <div class="col-md-6">
                                        <input id="company_logo" type="file" class="form-control" name="company_logo" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-auto">
                                        <a href="{{asset('archieve/company_ssm/'.$emp->company_ssm)}}" class="d_new1" target="_blank">
                                            View Company SSM
                                        </a>
                                    </div>
                                </div>
                                </br>
                                <div class="row mb-3">
                                    <label for="company_ssm" class="col-md-4 col-form-label text-md-end">Company SSM<br>(Format: PDF)</label>

                                    <div class="col-md-6">
                                        <input id="company_ssm" type="file" class="form-control" name="company_ssm" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row justify-content-center" style="margin-top: 20px; margin-bottom: 20px;">
                            <div class="col-auto">
                                <button type="submit" class="d_menu">
                                    Update Profile
                                </button>
                            </div>
                        </div> -->

                        <div class="button-container">
                            <button type="submit" class="updatebutton">Update</button>
                            <button type="button" class="cancelbutton" onclick="window.location.href='/employer/company_profile'">Cancel</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
