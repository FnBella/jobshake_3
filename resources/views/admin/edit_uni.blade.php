@extends('layouts.side_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background:black; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Edit University</b></h3>
                        </div>
                    </div>
                </div>
                <form action="{{route('admin.update_uni')}}" method="POST">
                    @csrf
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
                        <div class="row mb-4">
                            <label for="university_name" class="col-md-4 col-form-label text-md-end">University Name</label>

                            <div class="col-md-6">
                                <input type="text" name="uni_id" value="{{$uni->id}}" hidden>
                                <input id="university_name" type="text" class="form-control" name="university_name" value="{{$uni->university_name}}" placeholder="Universiti Malaya" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="state" class="col-md-4 col-form-label text-md-end">State</label>

                            <div class="col-md-6">
                                <select name="state" id="state" class="form-select" required autofocus>
                                    @if($uni->state != null)
                                        <option value="{{$uni->state}}">{{$uni->state}}</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Terengganu">Terengganu</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Wilayah Persekutuan KL/Labuan">Wilayah Persekutuan KL/Labuan</option>
                                        <option value="Luar Negara">Luar Negara</option>
                                    @else
                                        <option value="">Please Select State</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Terengganu">Terengganu</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Wilayah Persekutuan KL/Labuan">Wilayah Persekutuan KL/Labuan</option>
                                        <option value="Luar Negara">Luar Negara</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4 justify-content-center">
                            <div class="col-auto">
                                <input type="submit" value="Submit" class="d_new">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
