<?php

namespace App\Http\Controllers;

use App\Models\StudentRating;
use App\Models\Job;
use App\Models\RequestJob;
use App\Models\Employer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Auth;

class StudentRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentRating  $studentRating
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRating $studentRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentRating  $studentRating
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRating $studentRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRating  $studentRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentRating $studentRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentRating  $studentRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRating $studentRating)
    {
        //
    }

    public function student_rating(Request $request){

        $user = Auth::user();

        $find_stu = Student::find($user->profile_id);

        if(!empty($find_stu)){

            $get_rate = StudentRating::where('student_id', $find_stu->id)->paginate(10);
            // $get_rate = StudentRating::where('student_id', $find_stu->id)->get();

            $countR = count($get_rate);

            if($countR > 0){

                $total_rate = 5 * $countR;

                $count_rate = 0;

                foreach($get_rate as $rates){

                    $rates->create = $rates->created_at->format('d-m-Y');

                    $count_rate = $count_rate + $rates->rate;

                }

                // dd($get_rate);
                
                $pie = 1;

                return view('student.my_rating')->with('rates', $get_rate)
                                                    ->with('pie', $pie)
                                                    ->with('total_rate', $total_rate)
                                                    ->with('count_rate', $count_rate)
                                                    ->with('bil_rate', $countR);

            }
            else{

                $pie = 0;

                return view('student.my_rating')->with('pie', $pie);

            }

        }
        else{

            return view('student.my_rating')->with('failed', 'Company Rating not found !');

        }

    }
}
