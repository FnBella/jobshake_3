<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Employer;
use App\Models\Student;
use App\Models\User;
use App\Models\University;
use File;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function new_login(){

        return view('guest_login');

    }
    public function guest_forgot(){

        return view('guest_forgot');

    }

    public function new_register(){

        return view('guest_register');

    }

    public function emp_login(){

        return view('employer.employer_login');

    }
  
    public function stu_login(){

        $unis = University::all();

        return view('student.student_login')->with('unis', $unis);

    }

    public function emp_reg(){

        return view('employer.employer_reg');

    }

    public function stu_reg(){

        return view('student.student_reg');

    }

    public function emp_submit(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_logo' => 'required|mimes:jpg,jpeg,png|max:30000',
            'company_ssm' => 'required|mimes:pdf|max:30000',
        ]);

        // dd($request);

        $create_employer = Employer::create([
            'email' => $request->email,
            'pic_name' => $request->name,
            'company_name' => $request->company_name,
            'contact_number' => $request->contact_number,
            'website_link' => $request->website_link,
            'ssm_number' => $request->ssm_number,
            'fields' => $request->fields,
            'address' => $request->address,
            'description' => $request->description,
            'password' => $request->password,
            'status' => 1,
        ]);

        if($request->has('company_logo')){
            
            $file_name1 = $create_employer->id.'.'.$request->company_logo->extension();

            $file1 = $request->company_logo;

            $file_folder1 = public_path('archieve/company_logo/');
            if(!File::isDirectory($file_folder1)){
                File::makeDirectory($file_folder1, 0777, true, true);
            }

            $file1->move($file_folder1, $file_name1);

            $create_employer->update([
                'company_logo' => $file_name1,
            ]);

        }

        if($request->has('company_ssm')){
            
            $file_name2 = $create_employer->id.'.'.$request->company_ssm->extension();

            $file2 = $request->company_ssm;

            $file_folder2 = public_path('archieve/company_ssm/');
            if(!File::isDirectory($file_folder2)){
                File::makeDirectory($file_folder2, 0777, true, true);
            }

            $file2->move($file_folder2, $file_name2);

            $create_employer->update([
                'company_ssm' => $file_name2,
            ]);

        }

        return redirect()->back()->with('registered', "Your Account Successfully Registered, Please Wait For Admin to Approved Your Account. Thank You !");

    }

    public function stu_submit(Request $request){

        // dd($request);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_pic' => 'required|mimes:jpg,jpeg,png|max:30000',
            'student_card' => 'required|mimes:jpg,jpeg,png|max:30000',
        ]);

        $create_student = Student::create([
            'name' => $request->name,
            'full_name' => $request->name,
            'email' => $request->email,
            'nationality' => $request->nationality,
            'ic_passport' => $request->ic_passport,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'university' => $request->university,
            'course' => $request->course,
            'semester' => $request->semester,
            'cgpa' => $request->cgpa,
            'fields' => $request->fields,
            'skills' => $request->skills,
            'description' => $request->description,
            'password' => $request->password,
            'status' => 1,
        ]);

        if($request->has('profile_pic')){
            
            $file_name1 = $create_student->id.'.'.$request->profile_pic->extension();

            $file1 = $request->profile_pic;

            $file_folder1 = public_path('archieve/profile/');
            if(!File::isDirectory($file_folder1)){
                File::makeDirectory($file_folder1, 0777, true, true);
            }

            $file1->move($file_folder1, $file_name1);

            $create_student->update([
                'profile_pic' => $file_name1,
            ]);

        }

        if($request->has('student_card')){
            
            $file_name2 = $create_student->id.'.'.$request->student_card->extension();

            $file2 = $request->student_card;

            $file_folder2 = public_path('archieve/student_card/');
            if(!File::isDirectory($file_folder2)){
                File::makeDirectory($file_folder2, 0777, true, true);
            }

            $file2->move($file_folder2, $file_name2);

            $create_student->update([
                'student_card' => $file_name2,
            ]);

        }

        return redirect()->back()->with('registered', "Your Account Successfully Registered, Please Wait For Admin to Approved Your Account. Thank You !");

    }


    public function check_email(Request $request){

        // dd($request);

        $find_email = User::where('email', $request->email)->first();

        // dd($find_email);

        if(!empty($find_email)){

            return view('guest_reset')->with('user', $find_email);

        }
        else{

            return redirect()->back()->with('failed', "Your Email Address Not Found. Please Check Again Your Email Address.");

        }

    }

    public function update_password(Request $request){

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $find_user = User::find($request->id);

        if(!empty($find_user)){

            $find_user->update([
                'password' => Hash::make($request->password),
            ]);

            if($request->type == "0"){

                $find_profile = Student::find($request->profile_id);

                if(!empty($find_profile)){

                    $find_profile->update([
                        'password' => $request->password,
                    ]);

                    return redirect()->route('guest.login')->with('success', "Password Successfully Reset & Updated.");

                }
                else{

                    return redirect()->back()->with('failed', "Failed to Reset Password & Update Password.");

                }

            }
            else{

                $find_profile = Employer::find($request->profile_id);

                if(!empty($find_profile)){

                    $find_profile->update([
                        'password' => $request->password,
                    ]);

                    return redirect()->route('guest.login')->with('success', "Password Successfully Reset & Updated.");

                }
                else{

                    return redirect()->back()->with('failed', "Failed to Reset Password & Update Password.");

                }

            }
            
        }
        else{

            return redirect()->back()->with('failed', "Failed to Reset Password.");

        }

        return redirect()->back()->with('failed', "Failed to Reset Password.");

    }

}
