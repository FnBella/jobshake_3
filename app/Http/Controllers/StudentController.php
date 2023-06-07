<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\RequestJob;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Auth;
use File;
use Storage;

class StudentController extends Controller
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
    

    public function studentHome(){

        $user = Auth::user();

        $find_job_a = Job::where('student_id', $user->profile_id)->whereIn('status', [1,2,6])->get();

        $countA = count($find_job_a);

        $find_job_b = Job::where('student_id', $user->profile_id)->whereIn('status', [3,5])->get();

        $countB = count($find_job_b);

        if($countA > 0 && $countB > 0){

            return view('student.home')->with('jobs_a', $find_job_a)
                                        ->with('jobs_b', $find_job_b);

        }
        else if($countA > 0 && $countB == null){

            return view('student.home')->with('jobs_a', $find_job_a);

        }
        else if($countA == null && $countB > 0){

            return view('student.home')->with('jobs_b', $find_job_b);

        }
        else{

            return view('student.home');

        }

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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function my_profile(){

        $profile_id = Auth::user()->profile_id;

        $find_student = Student::find($profile_id);

        if(!empty($find_student)){

            return view('student.my_profile')->with('stu', $find_student);
            
        }
        else{

            return redirect()->back()->with('error', "My Profile not found !");

        }

    }

    public function edit_profile($id){

        $find_student = Student::find($id);

        if(!empty($find_student)){
            
            return view('student.edit_profile')->with('stu', $find_student);

        }
        else{

            return redirect()->back()->with('failed', "Profile not found !");

        }

    }

    public function update_profile(Request $request){

        // dd($request);

        $find_student = Student::find($request->student_id);

        $find_user = Auth::user();

        if(!empty($find_student)){

            $find_student->update([
                'name' => $request->name,
                'full_name' => $request->name,
                'nationality' => $request->nationality,
                'ic_passport' => $request->ic_passport,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'university' => $request->university,
                'course' => $request->course,
                'semester' => $request->semester,
                'cgpa' => $request->cgpa,
                'fields' => $request->fields,
                'skills' => $request->skills,
                'description' => $request->description,
            ]);

            if($request->has('profile_pic')){ 

                $request->validate([
                    'profile_pic' => 'required|mimes:jpg,jpeg,png|max:30000',
                ]);
                
                if($find_student->profile_pic != null){

                    // check file exist and remove
                    $path = public_path() . '/archieve/profile/'.$find_student->profile_pic;
        
                    if(file_exists($path)){
        
                        unlink($path);
        
                    }
        
                }
                
                $file_name1 = $find_student->id.'.'.$request->profile_pic->extension();

                $file1 = $request->profile_pic;

                $file_folder1 = public_path('archieve/profile/');
                if(!File::isDirectory($file_folder1)){
                    File::makeDirectory($file_folder1, 0777, true, true);
                }

                $file1->move($file_folder1, $file_name1);

                $find_student->update([
                    'profile_pic' => $file_name1,
                ]);

            }

            if($request->has('student_card')){

                $request->validate([
                    'student_card' => 'required|mimes:jpg,jpeg,png|max:30000',
                ]);

                if($find_student->student_card != null){
    
                    // check file exist and remove
                    $path = public_path() . '/archieve/student_card/'.$find_student->student_card;
        
                    if(file_exists($path)){
        
                        unlink($path);
        
                    }
        
                }
                
                $file_name2 = $find_student->id.'.'.$request->student_card->extension();

                $file2 = $request->student_card;

                $file_folder2 = public_path('archieve/student_card/');
                if(!File::isDirectory($file_folder2)){
                    File::makeDirectory($file_folder2, 0777, true, true);
                }

                $file2->move($file_folder2, $file_name2);

                $find_student->update([
                    'student_card' => $file_name2,
                ]);

            }

            $find_user->update([
                'name' => $request->name,
            ]);

            return redirect()->back()->with('success', "Your Profile Successfully Updated !");
            
        }
        else{

            return redirect()->back()->with('failed', "Your Profile not found !");

        }

    }


    public function my_job(){

        $user = Auth::user();

        $find_pro = Student::find($user->profile_id);

        $find_job = Job::where('student_id', $find_pro->id)->whereIn('status', [1,2,3,6,5])->get();

        $find_req = RequestJob::where('student_id', $find_pro->id)->where('status', 1)->get();

        $countJ = count($find_job);

        $countR = count($find_req);

        if($countJ > 0 && $countR > 0){

            return view('student.my_job')->with('jobs', $find_job)
                                        ->with('requests', $find_req);

        }
        elseif($countJ > 0 && $countR == null){

            return view('student.my_job')->with('jobs', $find_job);

        }
        elseif($countJ == null && $countR > 0){

            return view('student.my_job')->with('requests', $find_req);

        }
        else{

            return view('student.my_job');

        }

    }


}
