@extends('layouts.side_student')

@section('content')

<style>


.donut-size {
  font-size: 12em;
}

.pie-wrapper {
  position: relative;
  width: 1em;
  height: 1em;
  margin: 0px auto;
}
.pie-wrapper .pie {
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  clip: rect(0, 1em, 1em, 0.5em);
}
.pie-wrapper .half-circle {
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  border: 0.1em solid #1abc9c;
  border-radius: 50%;
  clip: rect(0em, 0.5em, 1em, 0em);
}
.pie-wrapper .right-side {
  transform: rotate(0deg);
}
.pie-wrapper .label {
  position: absolute;
  top: 0.52em;
  right: 0.4em;
  bottom: 0.4em;
  left: 0.4em;
  display: block;
  background: none;
  border-radius: 50%;
  color: #7F8C8D;
  font-size: 0.25em;
  line-height: 2.6em;
  text-align: center;
  cursor: default;
  z-index: 2;
}
.pie-wrapper .smaller {
  padding-bottom: 20px;
  color: #BDC3C7;
  font-size: 0.45em;
  vertical-align: super;
}
.pie-wrapper .shadow {
  width: 100%;
  height: 100%;
  border: 0.1em solid #BDC3C7;
  border-radius: 50%;
}

.per_rep{
    text-align:center !important;
    font-size: 16px;
    margin-left: 20px;
    margin-right: 20px;
}

        
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

@if(isset($rates))
    @foreach($rates as $rating)
        .new-star-rating.star-{{$rating->rate}} {width: 150px;}
        .new-star-rating.star-{{$rating->rate}} input,
        .new-star-rating.star-{{$rating->rate}} i {width: 20%;}
        .new-star-rating.star-{{$rating->rate}} i ~ i {width: 40%;}
        .new-star-rating.star-{{$rating->rate}} i ~ i ~ i {width: 60%;}
        .new-star-rating.star-{{$rating->rate}} i ~ i ~ i ~ i {width: 80%;}
        .new-star-rating.star-{{$rating->rate}} i ~ i ~ i ~ i ~i {width: 100%;}
    @endforeach
@endif


</style>

<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">

            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>Rating List</b></h3>
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
                    <div class="row p-3 my-3 justify-content-center">
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name - Job Title & Rating</th>
                                        <th style="text-align:center;">Rated Date</th>
                                    </tr>
                                </thead>
                                @if(isset($rates))
                                    <tbody>
                                        @foreach($rates as $rating)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <div class="col-md-12">
                                                        {{$rating->job->employer->company_name}} - {{$rating->job->job_name}}
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="new-star-rating star-{{$rating->rate}}">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <input type="radio" name="rating{{$loop->iteration}}" value="{{$i}}" {{$rating->rate == $i ? 'checked' : 'disabled'}}><i></i>
                                                            @endfor
                                                        </span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        Feedback: {{$rating->remark}}
                                                    </div>
                                                </td>
                                                <td style="text-align:center;">{{$rating->create}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="text-align: center;">No Rating Recorded</td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                        <div class="col-md-4" style="border:2px solid black;">
                            @if($pie == 1)
                                <input type="number" id="total_rate" value="{{$total_rate}}" hidden>
                                <input type="number" id="count_rate" value="{{$count_rate}}" hidden>
                                <input type="number" id="percent" value="" hidden>
                                <div class="row my-5 justify-content-center">
                                    <div class="col-auto">
                                        <h4><b>Satisfaction</b></h4>
                                    </div>
                                </div>
                                <div class="row mb-5 justify-content-center">
                                    <div class="col-auto">
                                        <div id="specificChart" class="donut-size">
                                            <div class="pie-wrapper">
                                                <span class="label">
                                                    <span class="num">0</span><span class="smaller">%</span>
                                                </span>
                                                <div class="pie">
                                                <div class="left-side half-circle"></div>
                                                <div class="right-side half-circle"></div>
                                                </div>
                                                <div class="shadow"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5 justify-content-center">
                                    <div class="col-auto percent_report">
                                    </div>
                                </div>
                                <div class="row mb-5 justify-content-center">
                                    <div class="col-auto">
                                        <p class="per_rep">Based on {{$bil_rate}} ratings.</p>
                                    </div>
                                </div>
                            @else
                                <input type="number" id="percent" value="0" hidden>
                                <div class="row my-5 justify-content-center">
                                    <div class="col-auto">
                                        <h4><b>Satisfaction</b></h4>
                                    </div>
                                </div>
                                <div class="row mb-5 justify-content-center">
                                    <div class="col-auto">
                                        <div id="specificChart" class="donut-size">
                                            <div class="pie-wrapper">
                                                <span class="label">
                                                    <span class="num">0</span><span class="smaller">%</span>
                                                </span>
                                                <div class="pie">
                                                <div class="left-side half-circle"></div>
                                                <div class="right-side half-circle"></div>
                                                </div>
                                                <div class="shadow"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5 justify-content-center">
                                    <div class="col-auto percent_report">
                                    </div>
                                </div>
                                <div class="row mb-5 justify-content-center">
                                    <div class="col-auto">
                                        <p class="per_rep">0 ratings.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @if(isset($rates))
                        <div class="row justify-content-center" style="margin-top: 50px !important;">
                            <div class="col-auto">
                                {{ $rates->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if($pie == 1)
<script>

    // function showChart(){

        var total_rate = parseFloat($('#total_rate').val());
        var count_rate = parseFloat($('#count_rate').val());

        var calc = (count_rate / total_rate) * 100;

        var good = Math.round(calc);
        var bad = 100 - calc;

        $('#percent').val(good);

        function updateDonutChart (el, percent, donut) {
            percent = Math.round(percent);
            if (percent > 100) {
                percent = 100;
            } else if (percent < 0) {
                percent = 0;
            }
            var deg = Math.round(360 * (percent / 100));

            if (percent > 50) {
                $(el + ' .pie').css('clip', 'rect(auto, auto, auto, auto)');
                $(el + ' .right-side').css('transform', 'rotate(180deg)');
            } else {
                $(el + ' .pie').css('clip', 'rect(0, 1em, 1em, 0.5em)');
                $(el + ' .right-side').css('transform', 'rotate(0deg)');
            }
            if (donut) {
                $(el + ' .right-side').css('border-width', '0.1em');
                $(el + ' .left-side').css('border-width', '0.1em');
                $(el + ' .shadow').css('border-width', '0.1em');
            } else {
                $(el + ' .right-side').css('border-width', '0.5em');
                $(el + ' .left-side').css('border-width', '0.5em');
                $(el + ' .shadow').css('border-width', '0.5em');
            }

            $(el + ' .num').text(percent);
            $(el + ' .left-side').css('transform', 'rotate(' + deg + 'deg)');

            // text percent
            if(percent = 0 && percent <= 50){
                console.log('test1');

                var rep = '';

                rep += '<p class="per_rep">Student / Freelancer need to improved. Increase skills, give a completed job / solution, do not exceed than duration given, and try to communicate more with company.</p>';

                $('.percent_report').empty();
                $('.percent_report').append(rep);

            }
            else if(percent = 51 && percent <= 70){
                console.log('test2');

                var rep = '';

                rep += '<p class="per_rep">Companies are satisfied with the job completed by student / freelancer, however there are some improvement can be made to increase student reputation, knowledge and ratings.</p>';

                $('.percent_report').empty();
                $('.percent_report').append(rep);

            }
            else if(percent = 71 && percent <= 100){
                console.log('test3');

                var rep = '';

                rep += '<p class="per_rep">Most companies thinks this student is good. Keep it up !</p>';

                $('.percent_report').empty();
                $('.percent_report').append(rep);

            }

        }

        // Pass in a number for the percent
        updateDonutChart('#specificChart', good, true);

    // }

</script>
@endif

@endsection
