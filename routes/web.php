<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/#about_us', function(){
    return view('welcome');
})->name('#about_us');
Route::get('/#how_work', function(){
    return view('welcome');
})->name('#how_work');
Route::get('/#contact_us', function(){
    return view('welcome');
})->name('#contact_us');

// Route::get('/only_for_admin/register/form', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/guest_login', [App\Http\Controllers\HomeController::class, 'new_login'])->name('guest.login');
Route::get('/guest_register', [App\Http\Controllers\HomeController::class, 'new_register'])->name('guest.register');
Route::get('/emp_login', [App\Http\Controllers\HomeController::class, 'emp_login'])->name('emp.login');
Route::get('/stu_login', [App\Http\Controllers\HomeController::class, 'stu_login'])->name('stu.login');
Route::get('/emp_register', [App\Http\Controllers\HomeController::class, 'emp_reg'])->name('emp.register');
Route::get('/stu_register', [App\Http\Controllers\HomeController::class, 'stu_reg'])->name('stu.register');
Route::post('/emp_submit', [App\Http\Controllers\HomeController::class, 'emp_submit'])->name('emp.submit');
Route::post('/stu_submit', [App\Http\Controllers\HomeController::class, 'stu_submit'])->name('stu.submit');
Route::get('/guest_forgot', [App\Http\Controllers\HomeController::class, 'guest_forgot'])->name('guest.forgot');
Route::get('/check_email', [App\Http\Controllers\HomeController::class, 'check_email'])->name('guest.check_email');
Route::post('/reset_update_password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('guest.reset_update_password');

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function(){
  // normal admin route
  Route::get('/', [App\Http\Controllers\AdminController::class, 'adminHome'])->name('admin.home');

  // admin student
  Route::get('/student_list', [App\Http\Controllers\AdminController::class, 'view_student_list'])->name('admin.student_list');
  Route::get('/student_application_list', [App\Http\Controllers\AdminController::class, 'stu_app_list'])->name('admin.stu_app_list');
  Route::get('/view_student_application/{id}', [App\Http\Controllers\AdminController::class, 'view_stu_app'])->name('admin.view_stu_app');
  Route::post('/approve_reject_student', [App\Http\Controllers\AdminController::class, 'approve_reject_stu'])->name('admin.app_rej_stu');
  Route::get('/view_stu_details/{id}', [App\Http\Controllers\AdminController::class, 'view_stu_details'])->name('admin.view_stu_details');
  Route::post('/remove_student', [App\Http\Controllers\AdminController::class, 'remove_stu'])->name('admin.remove_stu');

  // admin employer
  Route::get('/employer_list', [App\Http\Controllers\AdminController::class, 'view_employer_list'])->name('admin.employer_list');
  Route::get('/employer_application_list', [App\Http\Controllers\AdminController::class, 'emp_app_list'])->name('admin.emp_app_list');
  Route::get('/view_emp_application/{id}', [App\Http\Controllers\AdminController::class, 'view_emp_app'])->name('admin.view_emp_app');
  Route::post('/approve_reject_employer', [App\Http\Controllers\AdminController::class, 'approve_reject_emp'])->name('admin.app_rej_emp');
  Route::get('/view_emp_details/{id}', [App\Http\Controllers\AdminController::class, 'view_emp_details'])->name('admin.view_emp_details');
  Route::post('/remove_employer', [App\Http\Controllers\AdminController::class, 'remove_emp'])->name('admin.remove_emp');

  // amdin university
  Route::get('/university_list', [App\Http\Controllers\AdminController::class, 'view_university_list'])->name('admin.university_list');
  Route::get('/add_university', [App\Http\Controllers\AdminController::class, 'add_uni_form'])->name('admin.add_uni');
  Route::post('/submit_uni', [App\Http\Controllers\AdminController::class, 'submit_uni'])->name('admin.submit_uni');
  Route::get('/edit_uni/{id}', [App\Http\Controllers\AdminController::class, 'edit_uni_form'])->name('admin.edit_uni');
  Route::post('/update_uni', [App\Http\Controllers\AdminController::class, 'update_uni'])->name('admin.update_uni');
  Route::post('/delete_uni', [App\Http\Controllers\AdminController::class, 'delete_uni'])->name('admin.delete_uni');

});

Route::prefix('employer')->middleware(['auth', 'is_admin'])->group(function(){
  Route::get('/', [App\Http\Controllers\EmployerController::class, 'employerHome'])->name('employer.home');
  Route::get('/company_profile', [App\Http\Controllers\EmployerController::class, 'company_profile'])->name('employer.company_profile');
  Route::get('/edit_profile/{id}', [App\Http\Controllers\EmployerController::class, 'edit_profile'])->name('employer.edit_profile');
  Route::post('/update_profile', [App\Http\Controllers\EmployerController::class, 'update_profile'])->name('employer.update_profile');
  Route::get('/student_list', [App\Http\Controllers\EmployerController::class, 'student_list'])->name('employer.student_list');
  Route::post('/filter_student_list', [App\Http\Controllers\EmployerController::class, 'filter_student_list'])->name('employer.filter_student_list');
  Route::get('/view_student/{id}', [App\Http\Controllers\EmployerController::class, 'view_student'])->name('employer.view_student');
  Route::post('/submit_request_job', [App\Http\Controllers\JobController::class, 'submit_request_job'])->name('employer.submit_req_job');
  Route::get('/send_chat_from_req', [App\Http\Controllers\ChatController::class, 'send_from_req'])->name('send-from-req');
  Route::get('/job_list', [App\Http\Controllers\JobController::class, 'emp_job_list'])->name('employer.job_list');
  Route::get('/view_job_details/{id}', [App\Http\Controllers\JobController::class, 'emp_view_job_details'])->name('employer.view_job_details');
  Route::post('/update_request_job', [App\Http\Controllers\JobController::class, 'update_request_job'])->name('employer.update_req_job');
  Route::post('/delete_job_req', [App\Http\Controllers\JobController::class, 'delete_job_req'])->name('employer.delete_job_req');
  Route::post('/submit_rate_complete', [App\Http\Controllers\JobController::class, 'emp_submit_rate_complete'])->name('employer.submit_rate_complete');
  Route::post('/submit_remark_reject', [App\Http\Controllers\JobController::class, 'emp_submit_remark_reject'])->name('employer.submit_remark_reject');
  Route::get('/rating_list', [App\Http\Controllers\CompanyRatingController::class, 'emp_company_rating'])->name('employer.rating_list');
  Route::get('/chat_list', [App\Http\Controllers\ChatController::class, 'emp_chat_list'])->name('employer.chat_list');
  Route::get('/emp_chat_student', [App\Http\Controllers\ChatController::class, 'emp_chat_student'])->name('emp_chat_student');
  Route::get('/send_chat_from_emp', [App\Http\Controllers\ChatController::class, 'send_from_emp'])->name('send-from-emp');

});

Route::prefix('student')->middleware(['auth', 'is_admin'])->group(function(){
  Route::get('/', [App\Http\Controllers\StudentController::class, 'studentHome'])->name('student.home');
  Route::get('/my_profile', [App\Http\Controllers\StudentController::class, 'my_profile'])->name('student.profile');
  Route::get('/edit_profile/{id}', [App\Http\Controllers\StudentController::class, 'edit_profile'])->name('student.edit_profile');
  Route::post('/update_profile', [App\Http\Controllers\StudentController::class, 'update_profile'])->name('student.update_profile');
  Route::get('/my_job', [App\Http\Controllers\StudentController::class, 'my_job'])->name('student.job');
  Route::get('/view_job_req/{id}', [App\Http\Controllers\RequestJobController::class, 'stu_view_job_req'])->name('student.view_job_req');
  Route::post('/acc_rej_job_req', [App\Http\Controllers\RequestJobController::class, 'acc_rej_job_req'])->name('student.acc_rej_job_req');
  Route::get('/view_job_details/{id}', [App\Http\Controllers\JobController::class, 'stu_view_job_details'])->name('student.view_job_details');
  Route::post('/update_job_progress', [App\Http\Controllers\JobController::class, 'stu_update_job_progress'])->name('student.update_job_progress');
  Route::post('/submit_rate_company', [App\Http\Controllers\JobController::class, 'stu_submit_rate_company'])->name('student.submit_rate_company');
  Route::get('/my_rating', [App\Http\Controllers\StudentRatingController::class, 'student_rating'])->name('student.my_rating');
  Route::get('/my_chat', [App\Http\Controllers\ChatController::class, 'stu_chat_list'])->name('student.chat_list');
  Route::get('/student_chat_emp', [App\Http\Controllers\ChatController::class, 'student_chat_emp'])->name('student_chat_emp');
  Route::get('/send_chat_from_stu', [App\Http\Controllers\ChatController::class, 'send_from_stu'])->name('send-from-stu');

});
