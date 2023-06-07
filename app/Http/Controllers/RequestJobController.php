<?php

namespace App\Http\Controllers;

use App\Models\RequestJob;
use App\Models\Job;
use Illuminate\Http\Request;

class RequestJobController extends Controller
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
     * @param  \App\Models\RequestJob  $requestJob
     * @return \Illuminate\Http\Response
     */
    public function show(RequestJob $requestJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestJob  $requestJob
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestJob $requestJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestJob  $requestJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestJob $requestJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestJob  $requestJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestJob $requestJob)
    {
        //
    }

    public function stu_view_job_req($id){

        $find_req = RequestJob::find($id);

        return view('student.view_job_req')->with('req', $find_req);

    }

    public function acc_rej_job_req(Request $request){

        $find_req = RequestJob::find($request->req_id);

        $find_job = Job::find($find_req->job_id);

        if($request->accept_reject == "1"){

            $find_req->update([
                'status' => 2,
            ]);

            $find_job->update([
                'status' => 1,
            ]);

            return redirect()->back()->with('success', "Job Request Successfully Accepted ! ");

        }
        else{

            $find_req->update([
                'status' => 10,
            ]);

            $find_job->update([
                'status' => 10,
            ]);

            return redirect()->back()->with('faield', "Job Request Successfully Rejected ! ");

        }

    }

}
