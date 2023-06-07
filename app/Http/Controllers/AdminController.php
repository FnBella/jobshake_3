<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Employer;
use App\Models\User;
use App\Models\Job;
use App\Models\University;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function adminHome(){

        $get_user = User::whereIn('is_admin', [0,2])->get();

        $countU = count($get_user); //to count appproved total user

        $get_emp = User::where('is_admin', 2)->get();

        $countE = count($get_emp); //to count appproved total employer

        $get_stu = User::where('is_admin', 0)->get();

        $countS = count($get_stu); //to count appproved total student

        $get_pro_emp = Employer::all();

        $totalPE = count($get_pro_emp); //to count total employer request

        $get_pro_stu = Student::all();

        $totalPS = count($get_pro_stu); //to count total student request

        $countPE = $totalPE - $countE;

        $countPS = $totalPS - $countS;

        $get_all_job = Job::all();

        $countAJ = count($get_all_job); //to count total job record

        $get_com_job = Job::where('status', 3)->get(); //get status 3 completed

        $countCJ = count($get_com_job); //to count total job complete

        $get_act_job = Job::whereIn('status', [0,1,2,6])->get(); // get status 0 request, 1 approve, 2 in progress, 6 pending 

        $countXJ = count($get_act_job); //to count total active job

        $get_reject_emp = Employer::where('status', 3)->withTrashed()->get(); //get status 3 completed

        $countRE = count($get_reject_emp); //to count total rejected employer 

        $get_reject_student = Student::where('status', 3)->withTrashed()->get(); //get status 3 completed

        $countRS = count($get_reject_student); //to count total rejected student
        
        return view('admin.home')->with('countU', $countU)
                                ->with('countE', $countE)
                                ->with('countS', $countS)
                                ->with('countPE', $countPE)
                                ->with('countPS', $countPS)
                                ->with('countAJ', $countAJ)
                                ->with('countCJ', $countCJ)
                                ->with('countXJ', $countXJ)
                                ->with('countRE', $countRE)
                                ->with('countRS', $countRS);

    }

    public function view_student_list(){

        $students = Student::where('status', 2)->paginate(10);

        return view('admin.student_list')->with('students', $students);

    }
    
    public function view_employer_list(){

        $employers = Employer::where('status', 2)->paginate(10);

        return view('admin.employer_list')->with('employers', $employers);

    }

    
    public function view_university_list(){

        $universitys = University::paginate(10);

        return view('admin.university_list')->with('unis', $universitys);

    }

    public function add_uni_form(){

        return view('admin.add_uni');

    }

    public function submit_uni(Request $request){

        $create_uni = University::create([
            'university_name' => $request->university_name,
            'state' => $request->state,
        ]);

        if(!empty($create_uni)){

            return redirect()->back()->with('success', "University Successfully Added !");

        }
        else{

            return redirect()->back()->with('failed', "University Failed to Add !");

        }

    }

    public function edit_uni_form($id){

        $find_uni = University::find($id);

        if(!empty($find_uni)){

            return view('admin.edit_uni')->with('uni', $find_uni);

        }
        else{

            return redirect()->back()->with('error', "University Not Found !");

        }

    }

    public function update_uni(Request $request){

        $find_uni = University::find($request->uni_id);

        if(!empty($find_uni)){

            $find_uni->update([
                'university_name' => $request->university_name,
                'state' => $request->state,
            ]);

            return redirect()->back()->with('success', "University Successfully Updated !");

        }
        else{

            return redirect()->back()->with('failed', "University Failed to Update !");

        }

    }

    public function delete_uni(Request $request){

        $find_uni = University::find($request->uni_id);

        if(!empty($find_uni)){

            $find_uni->delete();

            return redirect()->back()->with('success', "University Successfully Deleted !");

        }
        else{

            return redirect()->back()->with('failed', "University Failed to Delete !");

        }

    }

    public function stu_app_list(){

        $students = Student::where('status', 1)->paginate(10);

        return view('admin.stu_app_list')->with('students', $students);

    }

    public function view_stu_app($id){

        $find_student = Student::find($id);

        return view('admin.stu_view_app')->with('stu', $find_student);

    }

    public function approve_reject_stu(Request $request){

        if($request->status == "approve"){

            $find_student = Student::find($request->student_id);

            $create_acc = User::create([
                'profile_id' => $find_student->id,
                'name' => $find_student->name,
                'email' => $find_student->email,
                'is_admin' => 0,
                'password' => Hash::make($find_student->password),
            ]);

            if(!empty($create_acc)){

                $find_student->update([
                    'status' => 2,
                ]);

                return redirect()->route('admin.stu_app_list')->with('success', "Student Successfully Approved !");

            }
            else{

                return redirect()->route('admin.stu_app_list')->with('error', "Error to Approve Student");

            }

        }
        else{

            $find_student = Student::find($request->student_id);

            if(!empty($find_student)){

                $find_student->update([
                    'status' => 3,
                ]);

                $find_student->delete();
    
                return redirect()->route('admin.stu_app_list')->with('success', "Student Successfully Rejected !");

            }
            else{

                return redirect()->route('admin.stu_app_list')->with('error', "Error to Reject Student");

            }

        }

    }

    public function emp_app_list(){

        $employers = Employer::where('status', 1)->paginate(10);

        return view('admin.emp_app_list')->with('employers', $employers);

    }
    

    public function view_emp_app($id){

        $find_employer = Employer::find($id);

        return view('admin.emp_view_app')->with('emp', $find_employer);

    }

    public function approve_reject_emp(Request $request){

        if($request->status == "approve"){

            $app = 2;

            $find_emp = Employer::find($request->emp_id);

            $find_emp->update([
                'status' => $app,
            ]);

            $create_acc = User::create([
                'profile_id' => $find_emp->id,
                'name' => $find_emp->pic_name,
                'email' => $find_emp->email,
                'is_admin' => 2,
                'password' => Hash::make($find_emp->password),
            ]);

            if(!empty($create_acc)){

                return redirect()->route('admin.emp_app_list')->with('success', "Employer Successfully Approved !");

            }
            else{

                return redirect()->route('admin.emp_app_list')->with('error', "Error to Approve Employer");

            }

        }
        else{

            $find_emp = Employer::find($request->emp_id);

            if(!empty($find_emp)){

                $find_emp->update([
                    'status' => 3,
                ]);

                $find_emp->delete();
    
                return redirect()->route('admin.emp_app_list')->with('success', "Employer Successfully Rejected !");

            }
            else{

                return redirect()->route('admin.emp_app_list')->with('error', "Error to Reject Employer");

            }

        }

    }

    
    public function view_emp_details($id){

        $find_employer = Employer::find($id);

        return view('admin.show_emp')->with('emp', $find_employer);

    }
    

    public function view_stu_details($id){

        $find_student = Student::find($id);

        return view('admin.show_stu')->with('stu', $find_student);

    }

    public function remove_emp(Request $request){

        $find_emp = Employer::find($request->emp_id);

        if(!empty($find_emp)){

            if($find_emp->company_logo != null){

                // check file exist and remove
                $path = public_path() . '/archieve/company_logo/'.$find_emp->company_logo;
    
                if(file_exists($path)){
    
                    unlink($path);
    
                }
    
            }

            if($find_emp->company_ssm != null){

                // check file exist and remove
                $path = public_path() . '/archieve/company_ssm/'.$find_emp->company_ssm;
    
                if(file_exists($path)){
    
                    unlink($path);
    
                }
    
            }

            $find_user = User::where('email', $find_emp->email)->first();

            $find_user->delete();

            $find_emp->delete();

            return redirect()->back()->with('success', "Employer Successfully Removed !");

        }
        else{

            return redirect()->back()->with('failed', "Employer id not found !");
            
        }

    }

    public function remove_stu(Request $request){

        $find_stu = Student::find($request->stu_id);

        if(!empty($find_stu)){

            if($find_stu->profile_pic != null){

                // check file exist and remove
                $path = public_path() . '/archieve/profile/'.$find_stu->profile_pic;
    
                if(file_exists($path)){
    
                    unlink($path);
    
                }
    
            }

            if($find_stu->student_card != null){

                // check file exist and remove
                $path = public_path() . '/archieve/student_card/'.$find_stu->student_card;
    
                if(file_exists($path)){
    
                    unlink($path);
    
                }
    
            }

            $find_user = User::where('email', $find_stu->email)->first();

            $find_user->delete();

            $find_stu->delete();

            return redirect()->back()->with('success', "Student Successfully Removed !");

        }
        else{

            return redirect()->back()->with('failed', "Student id not found !");
            
        }

    }


}
