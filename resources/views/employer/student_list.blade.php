@extends('layouts.side_employer')

@section('content')

<style>
    
.new-star-rating {
    font-size: 0;
    white-space: nowrap;
    display: inline-block;
    /* width: 250px; remove this */
    height: 30px;
    overflow: hidden;
    position: relative;
    background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
    background-size: contain;
}

.new-star-rating i {
    opacity: 0;
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    /* width: 20%; remove this */
    z-index: 1;
    background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
    background-size: contain;
}

.new-star-rating input {
    -moz-appearance: none;
    -webkit-appearance: none;
    opacity: 0;
    display: inline-block;
    /* width: 20%; remove this */
    height: 100%;
    margin: 0;
    padding: 0;
    z-index: 2;
    position: relative;
}

.new-star-rating input:checked + i {
    opacity: 1;
}
.new-star-rating i ~ i {
    width: 40%;
}
.new-star-rating i ~ i ~ i {
    width: 60%;
}
.new-star-rating i ~ i ~ i ~ i {
    width: 80%;
}
.new-star-rating i ~ i ~ i ~ i ~ i {
    width: 100%;
}

@if($stus != "0")
    @foreach($stus as $stu)
        .new-star-rating.star-{{$stu->rate}} {width: 150px;}
        .new-star-rating.star-{{$stu->rate}} input,
        .new-star-rating.star-{{$stu->rate}} i {width: 20%;}
        .new-star-rating.star-{{$stu->rate}} i ~ i {width: 40%;}
        .new-star-rating.star-{{$stu->rate}} i ~ i ~ i {width: 60%;}
        .new-star-rating.star-{{$stu->rate}} i ~ i ~ i ~ i {width: 80%;}
        .new-star-rating.star-{{$stu->rate}} i ~ i ~ i ~ i ~i {width: 100%;}
    @endforeach
@endif

</style>

<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-auto">

            <div class="card" style="margin-bottom: 50px; width:auto;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Student List</b></h3>
                        </div>
                        <div class="col-auto">
                            <form action="{{route('employer.filter_student_list')}}" class="form-inline" style="display:flex;" method="POST">
                                @csrf
                                <select name="fields" id="fields" class="form-select">
                                    <option value="">Filter By Fields</option>
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
                                &nbsp;
                                <button type="submit" class="btn btn-info">Filter</button>
                            </form>
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
                    <div class="row my-3 justify-content-between">
                        @if($stus != "0")
                            @foreach($stus as $stu)
                                <a href="{{route('employer.view_student', ['id'=>$stu->id])}}" class="col-auto list_stu">
                                    <div class="row" style="margin-left:0px !important; margin-right: 0px !important;">
                                        <div class="col-md-12" style="padding: 0px !important;">
                                            <img src="{{asset('archieve/profile/'.$stu->profile_pic)}}" alt="" height="180px" width="180" style="border: 1px solid black; background:white !important;">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-auto" style="padding: 0px !important; margin-top: 10px; margin-bottom: 10px; text-align:center;">
                                            <h5 style="margin-bottom: 0px !important;"><b>Name : {{$stu->name}}</b></h5>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-auto" style="padding: 0px !important; margin-top: 10px; margin-bottom: 10px;">
                                            <h5 style="margin-bottom: 0px !important;"><b>{{$stu->course}}</b></h5>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-auto">
                                            <span class="new-star-rating star-{{$stu->rate}}">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <input type="radio" name="rating{{$loop->iteration}}" value="{{$i}}" {{$stu->rate == $i ? 'checked' : 'disabled'}}><i></i>
                                                @endfor
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-auto">
                                            <h5 style="margin-bottom: 0px !important;"><b>{{$stu->rate}}.0</b></h5>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="col-md-12 text-center">
                                <h3>No Student Recorded</h3>
                            </div>
                        @endif
                    </div>
                    @if($stus != "0")
                        <div class="row justify-content-center" style="margin-top: 50px !important;">
                            <div class="col-auto">
                                {{ $stus->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
