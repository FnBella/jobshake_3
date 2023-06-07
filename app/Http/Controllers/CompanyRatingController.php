<?php

namespace App\Http\Controllers;

use App\Models\CompanyRating;
use App\Models\Job;
use App\Models\RequestJob;
use App\Models\Employer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Auth;

class CompanyRatingController extends Controller
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
     * @param  \App\Models\CompanyRating  $companyRating
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyRating $companyRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyRating  $companyRating
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyRating $companyRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyRating  $companyRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyRating $companyRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyRating  $companyRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyRating $companyRating)
    {
        //
    }

    public function emp_company_rating(Request $request){

        $user = Auth::user();

        $find_emp = Employer::find($user->profile_id);

        if(!empty($find_emp)){

            $get_rate = CompanyRating::where('company_id', $find_emp->id)->paginate(10);

            $countR = count($get_rate);

            if($countR > 0){

                $total_rate = 5 * $countR;

                $count_rate = 0;

                foreach($get_rate as $rates){

                    $rates->create = $rates->created_at->format('d-m-Y');

                    $count_rate = $count_rate + $rates->rate;

                }

                // dd($total_rate);
                
                $pie = 1;

                return view('employer.rating_list')->with('rates', $get_rate)
                                                    ->with('pie', $pie)
                                                    ->with('total_rate', $total_rate)
                                                    ->with('count_rate', $count_rate)
                                                    ->with('bil_rate', $countR);

            }
            else{

                $pie = 0;

                return view('employer.rating_list')->with('pie', $pie);

            }

        }
        else{

            return view('employer.rating_list')->with('failed', 'Company Rating not found !');

        }

    }



}
