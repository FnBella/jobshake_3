@extends('layouts.side_student')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 650px !important;">
        <div class="col-md-12">

            <div class="card" style="margin-bottom: 50px;">
                <div class="card-header" style="background:#d29d51; color:white;">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"> 
                            <h3 style="margin-bottom: 0px !important"><b>My Chat List</b></h3>
                        </div>
                        <!-- <div class="col-auto">
                            <a href="{{ url()->previous() }}" class="d_new">Back</a>
                        </div> -->
                    </div>
                </div>
                <div class="card-body" style="background:white;">
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
                    @if(isset($chats))
                        @foreach($chats as $chat)
                            <div class="row my-2 list_chat" id="my_chat" data-bs-toggle="modal" data-bs-target="#chatModal" data-stu_id="{{$chat->student_id}}" data-emp_id="{{$chat->company_id}}">
                                <div class="col-auto">
                                    <div class="row">
                                        <div class="col-auto my-3">
                                            <img src="{{asset('archieve/company_logo/'.$chat->employer->company_logo)}}" class="rounded-circle" alt="" height="50px" width="50" style="border: 2px solid black; background:white;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto align-items-center d-flex">
                                    <div class="row">
                                        <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                            <span>{{$chat->employer->company_name}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else    
                        <div class="row my-2" style="padding: 30px; background: white; margin: 30px; border:2px solid black; border-radius: 20px;">
                            <div class="col-md-12 align-items-center d-flex">
                                <div class="row">
                                    <div class="col-md-12" style="font-size: 20px; padding: 10px;">
                                        <span>No Chat Recorded</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Chat -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title company_name" id="exampleModalLabel">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <form action="{{route('employer.submit_rate_complete')}}" method="POST" enctype="multipart/form-data"> -->
                <!-- @csrf -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row my-3 justify-content-center">
                            <input type="number" id="student_id" hidden>
                            <input type="number" id="employer_id" hidden>
                            <div class="col-md-12" id="chat_display" style="min-height: 300px !important; background: #D8C3A5;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="input-group">
                        <input type="text" id="new_msg" class="form-control" name="message" placeholder="Message....." required autofocus>
                        <button type="button" id="send_msg" class="btn btn-success">Send</button>
                    </div>
                </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    $(document).on('click', '#my_chat', function(){

        var stu_id = $(this).attr('data-stu_id');
        var emp_id = $(this).attr('data-emp_id');

        console.log(stu_id);
        console.log(emp_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type:'GET',
            url:'{{route("student_chat_emp")}}',
            data: {
                'stu_id' : stu_id,
                'emp_id' : emp_id,
            },
            dataType: 'json',
            success:function(data) {
                console.log(data);

                $('.company_name').text(data.employer.company_name);

                $('#student_id').val(stu_id);
                $('#employer_id').val(emp_id);

                $('#chat_display').empty();

                var dis = '';

                if(data.chats == 1){

                    for(var i = 0; i < data.chat.length; i++){
                        
                        if(data.chat[i].status == 2){

                            dis += '<div class="row justify-content-end">';
                            dis +=      '<div class="col-md-6" style="padding: 10px; background: white; margin: 10px; border-radius: 10px;">';
                            dis +=          '<span><b>'+data.chat[i].emp_name+'</b><span>';
                            dis +=              '<p style="text-align:justify; margin-bottom:0px !important;">'+data.chat[i].message+'</p>';
                            dis +=          '<small>'+data.chat[i].send_time+'</small>';
                            dis +=      '</div>';
                            dis += '</div>';

                        }
                        else{

                            dis += '<div class="row justify-content-start">';
                            dis +=      '<div class="col-md-6" style="padding: 10px; background: white; margin: 10px; border-radius: 10px;">';
                            dis +=          '<span><b>'+data.chat[i].stu_name+'</b><span>';
                            dis +=              '<p style="text-align:justify; margin-bottom:0px !important;">'+data.chat[i].message+'</p>';
                            dis +=          '<small>'+data.chat[i].send_time+'</small>';
                            dis +=      '</div>';
                            dis += '</div>';

                        }

                    }

                }
                else{

                    dis += '<div class="row justify-content-center">';
                    dis +=      '<div class="col-md-6" style="padding: 10px; background: white; margin: 10px; border-radius: 10px;">';
                    dis +=          '<span><b>No Chat Recorded</b><span>';
                    dis +=      '</div>';
                    dis += '</div>';

                }

                $('#chat_display').append(dis);

            },
            
            error: function (msg) {
                console.log(msg);
                var errors = msg.responseJSON;
            }

        });

    });

    
    $(document).on('click', '#send_msg', function(){

        var stu_id = $('#student_id').val();
        var emp_id = $('#employer_id').val();
        var new_msg = $('#new_msg').val();

        console.log(stu_id);
        console.log(emp_id);
        console.log(new_msg);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'GET',
            url:'{{route("send-from-stu")}}',
            data: {
                'stu_id' : stu_id,
                'emp_id' : emp_id,
                'new_msg' : new_msg,
            },
            dataType: 'json',
            success:function(data) {
                console.log(data);

                $('#chat_display').empty();

                var dis = '';

                if(data.chats == 1){

                    for(var i = 0; i < data.chat.length; i++){
                        
                        if(data.chat[i].status == 2){

                            dis += '<div class="row justify-content-end">';
                            dis +=      '<div class="col-md-6" style="padding: 10px; background: white; margin: 10px; border-radius: 10px;">';
                            dis +=          '<span><b>'+data.chat[i].emp_name+'</b><span>';
                            dis +=              '<p style="text-align:justify; margin-bottom:0px !important;">'+data.chat[i].message+'</p>';
                            dis +=          '<small>'+data.chat[i].send_time+'</small>';
                            dis +=      '</div>';
                            dis += '</div>';

                        }
                        else{

                            dis += '<div class="row justify-content-start">';
                            dis +=      '<div class="col-md-6" style="padding: 10px; background: white; margin: 10px; border-radius: 10px;">';
                            dis +=          '<span><b>'+data.chat[i].stu_name+'</b><span>';
                            dis +=              '<p style="text-align:justify; margin-bottom:0px !important;">'+data.chat[i].message+'</p>';
                            dis +=          '<small>'+data.chat[i].send_time+'</small>';
                            dis +=      '</div>';
                            dis += '</div>';

                        }

                    }

                }
                else{

                    dis += '<div class="row justify-content-center">';
                    dis +=      '<div class="col-md-6" style="padding: 10px; background: white; margin: 10px; border-radius: 10px;">';
                    dis +=          '<span><b>No Chat Recorded</b><span>';
                    dis +=      '</div>';
                    dis += '</div>';

                }

                $('#chat_display').append(dis);

                $('#new_msg').val('');

            },
            
            error: function (msg) {
                console.log(msg);
                var errors = msg.responseJSON;
            }

        });

    });


</script>

@endsection
