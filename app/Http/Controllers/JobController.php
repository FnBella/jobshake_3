<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\RequestJob;
use App\Models\Employer;
use App\Models\Student;
use App\Models\User;
use App\Models\StudentRating;
use App\Models\CompanyRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Auth;
use File;
use Storage;

class JobController extends Controller
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
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }

    public function submit_request_job(Request $request){

        // dd($request);

        $request->validate([
            'job_file' => 'required|mimes:zip,pdf|max:1000000',
        ]);

        $find_user = User::where('id', $request->employer_id)->first();

        $create_job = Job::create([
            'job_name' => $request->job_title,
            'job_details' => $request->job_details,
            'payment' => $request->job_payment,
            'company_id' => $find_user->profile_id,
            'student_id' => $request->student_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 0,
        ]);

        if(!empty($create_job)){

            $file_name = $create_job->id.'.'.$request->job_file->extension();

            $file = $request->job_file;

            $file_folder = public_path('archieve/job/');
            if(!File::isDirectory($file_folder)){
                File::makeDirectory($file_folder, 0777, true, true);
            }

            $file->move($file_folder, $file_name);

            $create_job->update([
                'job_file' => $file_name,
            ]);

            $create_req = RequestJob::create([
                'job_id' => $create_job->id,
                'student_id' => $request->student_id,
                'status' => 1,
            ]);

            if(!empty($create_req)){
                
                return redirect()->back()->with('success', 'Job Request Successfully Sent !');

            }
            else{

                return redirect()->back()->with('failed', 'Job Request Failed to Sent !');

            }

        }
        else{

            return redirect()->back()->with('failed', 'Job Request Failed to Sent !');

        }


    }

    public function emp_job_list(){

        $user = Auth::user();

        $find_emp = Employer::where('id', $user->profile_id)->first();

        // dd($find_emp);

        $get_job = Job::where('company_id', $find_emp->id)->paginate(10);

        $countJ = count($get_job);

        if($countJ > 0){

            foreach($get_job as $job){

                $job->start = $job->start_date->format('d-m-Y');

                $job->end = $job->end_date->format('d-m-Y');

            }

            return view('employer.job_list')->with('jobs', $get_job);

        }
        else{

            return view('employer.job_list');

        }

    }

    public function emp_view_job_details($id){

        $find_job = Job::find($id);

        if(!empty($find_job)){

            $find_job->start = $find_job->start_date->format('d-m-Y');

            $find_job->end = $find_job->end_date->format('d-m-Y');

            return view('employer.view_job_details')->with('job', $find_job);

        }
        else{

            return redirect()->back()->with('failed', "Job Details not found ! ");

        }

    }

    public function update_request_job(Request $request){

        // dd($request);

        $find_job = Job::find($request->job_id);

        if(!empty($find_job)){

            $find_job->update([
                'job_name' => $request->job_title,
                'job_details' => $request->job_details,
                'payment' => $request->job_payment,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => 0,
            ]);

            if($request->hasFile('job_file')){

                if($find_job->job_file != null){

                    // check file exist and remove
                    $path = public_path() . '/archieve/job/'.$find_job->job_file;
        
                    if(file_exists($path)){
        
                        unlink($path);
        
                    }
        
                }

                $request->validate([
                    'job_file' => 'required|mimes:zip,pdf|max:1000000',
                ]);

                $file_name = $find_job->id.'.'.$request->job_file->extension();
    
                $file = $request->job_file;
    
                $file_folder = public_path('archieve/job/');
                if(!File::isDirectory($file_folder)){
                    File::makeDirectory($file_folder, 0777, true, true);
                }
    
                $file->move($file_folder, $file_name);

                $find_job->update([
                    'job_file' => $file_name,
                ]);

            }
                
            return redirect()->back()->with('success', 'Job Request Successfully Update !');

        }
        else{

            return redirect()->back()->with('failed', 'Job Request Failed to Update !');

        }


    }

    public function delete_job_req(Request $request){

        $find_job = Job::find($request->job_id);

        if(!empty($find_job)){

            if($find_job->status == 0){

                if($find_job->job_file != null){

                    // check file exist and remove
                    $path = public_path() . '/archieve/job/'.$find_job->job_file;
        
                    if(file_exists($path)){
        
                        unlink($path);
        
                    }
        
                }

                $find_req = RequestJob::find($find_job->id);

                if(!empty($find_req)){

                    $find_req->delete();

                }

                $find_job->delete();

                return redirect()->route('employer.job_list')->with('success', "Job Request Successfully Cancel ! ");

            }
            else{

                return redirect()->back()->with('failed', "Job Had Been Accept / Completed Cannot Be Removed ! ");

            }

        }
        else{

            return redirect()->back()->with('failed', "Failed to Find Job Request ! ");

        }

    }

    public function stu_view_job_details($id){

        $find_job = Job::find($id);

        if(!empty($find_job)){

            if($find_job->status == 1){

                $today = date("Y-m-d");
    
                // dd($today);
    
                if($find_job->start_date < $today || $find_job->start_date = $today){
    
                    $find_job->update([
                        'status' => 2,
                    ]);
    
                }

            }
            else{

                $check_rate = CompanyRating::where('job_id', $find_job->id)->first();

                if(empty($check_rate)){

                    $find_job->check_rate = 0;

                }
                else{

                    $find_job->check_rate = 1;

                }

            }
            

            $find_job->start = $find_job->start_date->format('d-m-Y');
            
            $find_job->end = $find_job->end_date->format('d-m-Y');

            return view('student.view_job_details')->with('job', $find_job);

        }
        else{

            return redirect()->back()->with('failed', "Failed to find Job Details ! ");

        }

    }

    public function stu_update_job_progress(Request $request){

        $find_job = Job::find($request->job_id);

        if(!empty($find_job)){

            if($request->hasFile('return_job_file')){

                $request->validate([
                    'return_job_file' => 'required|mimes:zip,pdf|max:1000000',
                ]);

                $file_name = $find_job->id.'.'.$request->return_job_file->extension();
    
                $file = $request->return_job_file;
    
                $file_folder = public_path('archieve/return_job/');
                if(!File::isDirectory($file_folder)){
                    File::makeDirectory($file_folder, 0777, true, true);
                }
    
                $file->move($file_folder, $file_name);

                $find_job->update([
                    'return_job_file' => $file_name,
                    'status' => 6,
                ]);

            }
                
            return redirect()->back()->with('success', 'Job Progress Successfully Update !');

        }
        else{
                
            return redirect()->back()->with('failed', 'Job Progress Failed to Update !');

        }

    }

    public function emp_submit_rate_complete(Request $request){

        // dd($request);

        $create_rate = StudentRating::create([
            'student_id' => $request->student_id,
            'job_id' => $request->job_id,
            'rate' => $request->rating,
            'remark' => $request->feedback,
        ]);

        if(!empty($create_rate)){

            $find_job = Job::find($request->job_id);

            if(!empty($find_job)){

                $find_job->update([
                    'status' => 3,
                ]);

            }

            return redirect()->back()->with('success', 'Job Is Completed and Student Rating Successfuly Submitted ! ');

        }
        else{

            return redirect()->back()->with('failed', 'Job Is Not Completed and Student Rating Failed to Submitted ! ');

        }

    }
    
    public function emp_submit_remark_reject(Request $request){

        // dd($request);

        $find_job = Job::find($request->job_id);

        if(!empty($find_job)){

            // check file exist and remove
            $path = public_path() . '/archieve/return_job/'.$find_job->return_job_file;

            if(file_exists($path)){

                unlink($path);

            }

            $find_job->update([
                'return_job_file' => "",
                'remark' => $request->remark,
                'status' => 2,
            ]);

            return redirect()->back()->with('success', 'Job Is Rejected and Remark Successfuly Submitted ! ');

        }
        else{

            return redirect()->back()->with('failed', 'Job Is Failed to Reject ! ');

        }

    }

    public function stu_submit_rate_company(Request $request){

        // dd($request);

        $find_job = Job::find($request->job_id);

        if(!empty($find_job)){

            $find_job->update([
                'status' => 5,
            ]);

        }

        $create_rate = CompanyRating::create([
            'company_id' => $request->employer_id,
            'job_id' => $request->job_id,
            'rate' => $request->rating,
            'remark' => $request->feedback,
        ]);

        if(!empty($create_rate)){

            return redirect()->back()->with('success', 'Company Rating Successfuly Submitted ! ');

        }
        else{

            return redirect()->back()->with('failed', 'Company Rating Failed to Submitted ! ');

        }

    }

}
