<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Student;
use App\Models\StudentRating;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Auth;
use File;
use Storage;

class EmployerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function employerHome(){

        $user = Auth::user();

        $find_job_a = Job::where('company_id', $user->profile_id)->whereIn('status', [1,2,6])->get();

        $countA = count($find_job_a);

        $find_job_b = Job::where('company_id', $user->profile_id)->whereIn('status', [3,5])->get();

        $countB = count($find_job_b);

        if($countA > 0 && $countB > 0){

            return view('employer.home')->with('jobs_a', $find_job_a)
                                        ->with('jobs_b', $find_job_b);

        }
        else if($countA > 0 && $countB == null){

            return view('employer.home')->with('jobs_a', $find_job_a);

        }
        else if($countA == null && $countB > 0){

            return view('employer.home')->with('jobs_b', $find_job_b);

        }
        else{

            return view('employer.home');

        }

        // return view('employer.home');

    }
    
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
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        //
    }

    public function company_profile(){

        $profile_id = Auth::user()->profile_id;

        $find_employer = Employer::find($profile_id);

        if(!empty($find_employer)){

            return view('employer.employer_profile')->with('emp', $find_employer);
            
        }
        else{

            return redirect()->back()->with('error', "Company Profile not found !");

        }

    }

    public function edit_profile($id){

        $find_employer = Employer::find($id);

        if(!empty($find_employer)){
            
            return view('employer.edit_profile')->with('emp', $find_employer);

        }
        else{

            return redirect()->back()->with('failed', "Company Profile not found !");

        }

    }

    public function update_profile(Request $request){

        // dd($request);

        $find_employer = Employer::find($request->employer_id);

        $find_user = Auth::user();

        if(!empty($find_employer)){

            $find_employer->update([
                'company_name' => $request->company_name,
                'pic_name' => $request->pic_name,
                'contact_number' => $request->contact_number,
                'fields' => $request->fields,
                'ssm_number' => $request->ssm_number,
                'address' => $request->address,
                'website_link' => $request->website_link,
                'description' => $request->description,
            ]);

            if($request->has('company_logo')){

                $request->validate([
                    'company_logo' => 'required|mimes:jpg,jpeg,png|max:30000',
                ]);
                
                if($find_employer->company_logo != null){

                    // check file exist and remove
                    $path = public_path() . '/archieve/company_logo/'.$find_employer->company_logo;
        
                    if(file_exists($path)){
        
                        unlink($path);
        
                    }
        
                }
                
                $file_name1 = $find_employer->id.'.'.$request->company_logo->extension();

                $file1 = $request->company_logo;

                $file_folder1 = public_path('archieve/company_logo/');
                if(!File::isDirectory($file_folder1)){
                    File::makeDirectory($file_folder1, 0777, true, true);
                }

                $file1->move($file_folder1, $file_name1);

                $find_employer->update([
                    'company_logo' => $file_name1,
                ]);

            }

            if($request->has('company_ssm')){
                
                $request->validate([
                    'company_ssm' => 'required|mimes:pdf|max:30000',
                ]);

                if($find_employer->company_ssm != null){
    
                    // check file exist and remove
                    $path = public_path() . '/archieve/company_ssm/'.$find_employer->company_ssm;
        
                    if(file_exists($path)){
        
                        unlink($path);
        
                    }
        
                }
                
                $file_name2 = $find_employer->id.'.'.$request->company_ssm->extension();

                $file2 = $request->company_ssm;

                $file_folder2 = public_path('archieve/company_ssm/');
                if(!File::isDirectory($file_folder2)){
                    File::makeDirectory($file_folder2, 0777, true, true);
                }

                $file2->move($file_folder2, $file_name2);

                $find_employer->update([
                    'company_ssm' => $file_name2,
                ]);

            }

            $find_user->update([
                'name' => $request->pic_name,
            ]);

            return redirect()->back()->with('success', "Company Profile Successfully Updated !");
            
        }
        else{

            return redirect()->back()->with('failed', "Company Profile not found !");

        }

    }

    public function student_list(){

        $get_student = Student::where('status', 2)->paginate(4);
        $countS = count($get_student);

        if($countS > 0){

            foreach($get_student as $student){
    
                $get_rate = StudentRating::where('student_id', $student->id)->get();
    
                $countR = count($get_rate);
    
                if($countR > 0){
    
                    $count_rate = 0;
    
                    foreach($get_rate as $rates){
    
                        $count_rate = $count_rate + $rates->rate;
    
                    }
    
                    $new_rate = $count_rate / $countR;
    
                    $round = round($new_rate);
    
                    $student->rate = $round;
    
                }
                else{
    
                    $student->rate = 0;
    
                }
    
            }

        }
        else{

            $get_student = "0";

        }

        // dd($get_student);

        return view('employer.student_list')->with('stus', $get_student);

    }

    public function filter_student_list(Request $request){

        // dd($request);

        $get_student = Student::where('status', 2)->where('fields', $request->fields)->get();
        $countS = count($get_student);

        if($countS > 0){

            foreach($get_student as $student){
    
                $get_rate = StudentRating::where('student_id', $student->id)->get();
    
                $countR = count($get_rate);
    
                if($countR > 0){
    
                    $count_rate = 0;
    
                    foreach($get_rate as $rates){
    
                        $count_rate = $count_rate + $rates->rate;
    
                    }
    
                    $new_rate = $count_rate / $countR;
    
                    $round = round($new_rate);
    
                    $student->rate = $round;
    
                }
                else{
    
                    $student->rate = 0;
    
                }
    
            }

        }
        else{

            $get_student = "0";

        }

        // dd($get_student);

        return view('employer.filter_student_list')->with('stus', $get_student);

    }


    public function view_student($id){

        $find_stu = Student::find($id);

        if(!empty($find_stu)){

            return view('employer.view_student')->with('stu', $find_stu);

        }
        else{

            return redirect()->back()->with('failed', "Student Profile failed to view !");

        }

    }

}
