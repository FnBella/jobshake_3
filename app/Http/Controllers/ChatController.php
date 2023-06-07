<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Employer;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Auth;

class ChatController extends Controller
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
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function send_from_req(Request $request){

        $find_user = User::where('id', $request->emp_id)->first();

        $find_emp = Employer::where('id', $find_user->profile_id)->first();

        $create_chat = Chat::create([
            'student_id' => $request->stu_id,
            'company_id' => $find_emp->id,
            'message' => $request->new_msg,
            'status' => 2,
        ]);

        if(!empty($create_chat)){

            // dd($find_emp);

            $create_chat->emp_name = $find_emp->company_name;

            $create_chat->send_time = $create_chat->created_at->format('d-m-Y h:i A');

            return $create_chat;

        }
        else{

            $failed = "failed to chat";

            return $failed;

        }

    }

    public function emp_chat_list(){

        $user = Auth::user();

        $emp = Employer::find($user->profile_id);

        $get_chat = Chat::select('*')->where('company_id', $emp->id)->groupBy('student_id')->get();

        $all_chat = Chat::where('company_id', $emp->id)->get();

        // dd($get_chat);

        $chat_per = array();

        $countC = count($get_chat);

        if($countC > 0){

            // foreach($get_chat as $chat){

            //     // array_push($student, $chat->student_id => $chat->student_id);
            //     // $student = $chat->student_id;
                
            //     $select_chat = Chat::where('company_id', $emp->id)->where('student_id', $chat->student_id)->orderBy('created_at')->get();

            //     $chat_per[$chat->student_id] = $select_chat;

            // }

            // dd($student);

            // return view('employer.company_chat_list')->with('chats', $get_chat)
            //                                         ->with('chat_per', $chat_per);

            return view('employer.company_chat_list')->with('chats', $get_chat);

        }
        else{

            return view('employer.company_chat_list');

        }

    }

    public function emp_chat_student(Request $request){

        $find_stud = Student::find($request->stu_id);

        $find_emp = Employer::find($request->emp_id);

        $select_chat = Chat::where('company_id', $request->emp_id)->where('student_id', $request->stu_id)->orderBy('created_at')->get();

        $countC = count($select_chat);

        if($countC > 0){

            foreach($select_chat as $chat){

                if($chat->status == 2){

                    $chat->emp_name = $find_emp->company_name;

                }
                else{

                    $chat->stu_name = $find_stud->full_name;

                }

                $chat->send_time = $chat->created_at->format('d-m-Y h:i A');

            }

            $chats = 1;

            $data = ['student' => $find_stud, 'chat' => $select_chat, 'chats' => $chats];
    
            return $data;

        }
        else{

            $chats = 0;

            $data = ['student' => $find_stud, 'chats' => $chats];
    
            return $data;

        }

    }

    public function send_from_emp(Request $request){
        
        $create_chat = Chat::create([
            'student_id' => $request->stu_id,
            'company_id' => $request->emp_id,
            'message' => $request->new_msg,
            'status' => 2,
        ]);

        if(!empty($create_chat)){

            $find_stud = Student::find($request->stu_id);

            $find_emp = Employer::find($request->emp_id);
    
            $select_chat = Chat::where('company_id', $request->emp_id)->where('student_id', $request->stu_id)->orderBy('created_at')->get();
    
            $countC = count($select_chat);
    
            if($countC > 0){
    
                foreach($select_chat as $chat){
    
                    if($chat->status == 2){
    
                        $chat->emp_name = $find_emp->company_name;
    
                    }
                    else{
    
                        $chat->stu_name = $find_stud->full_name;
    
                    }
    
                    $chat->send_time = $chat->created_at->format('d-m-Y h:i A');
    
                }
    
                $chats = 1;
    
                $data = ['student' => $find_stud, 'chat' => $select_chat, 'chats' => $chats];
        
                return $data;
    
            }
            else{
    
                $chats = 0;
    
                $data = ['student' => $find_stud, 'chats' => $chats];
        
                return $data;
    
            }

        }
        else{

            dd("Error chat");

        }

    }

    
    public function stu_chat_list(){

        $user = Auth::user();

        $stu = Student::find($user->profile_id);

        $get_chat = Chat::select('*')->where('student_id', $stu->id)->groupBy('company_id')->get();

        $all_chat = Chat::where('company_id', $stu->id)->get();

        // dd($get_chat);

        $chat_per = array();

        $countC = count($get_chat);

        if($countC > 0){

            return view('student.my_chat')->with('chats', $get_chat);

        }
        else{

            return view('student.my_chat');

        }

    }

    public function student_chat_emp(Request $request){

        $find_stud = Student::find($request->stu_id);

        $find_emp = Employer::find($request->emp_id);

        $select_chat = Chat::where('company_id', $request->emp_id)->where('student_id', $request->stu_id)->orderBy('created_at')->get();

        $countC = count($select_chat);

        if($countC > 0){

            foreach($select_chat as $chat){

                if($chat->status == 2){

                    $chat->emp_name = $find_emp->company_name;

                }
                else{

                    $chat->stu_name = $find_stud->full_name;

                }

                $chat->send_time = $chat->created_at->format('d-m-Y h:i A');

            }

            $chats = 1;

            $data = ['employer' => $find_emp, 'chat' => $select_chat, 'chats' => $chats];
    
            return $data;

        }
        else{

            $chats = 0;

            $data = ['student' => $find_stud, 'chats' => $chats];
    
            return $data;

        }

    }

    public function send_from_stu(Request $request){
        
        $create_chat = Chat::create([
            'student_id' => $request->stu_id,
            'company_id' => $request->emp_id,
            'message' => $request->new_msg,
            'status' => 1,
        ]);

        if(!empty($create_chat)){

            $find_stud = Student::find($request->stu_id);

            $find_emp = Employer::find($request->emp_id);
    
            $select_chat = Chat::where('company_id', $request->emp_id)->where('student_id', $request->stu_id)->orderBy('created_at')->get();
    
            $countC = count($select_chat);
    
            if($countC > 0){
    
                foreach($select_chat as $chat){
    
                    if($chat->status == 2){
    
                        $chat->emp_name = $find_emp->company_name;
    
                    }
                    else{
    
                        $chat->stu_name = $find_stud->full_name;
    
                    }
    
                    $chat->send_time = $chat->created_at->format('d-m-Y h:i A');
    
                }
    
                $chats = 1;
    
                $data = ['student' => $find_stud, 'chat' => $select_chat, 'chats' => $chats];
        
                return $data;
    
            }
            else{
    
                $chats = 0;
    
                $data = ['student' => $find_stud, 'chats' => $chats];
        
                return $data;
    
            }

        }
        else{

            dd("Error chat");

        }

    }

}
