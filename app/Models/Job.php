<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_name',
        'job_details',
        'payment',
        'company_id',
        'student_id',
        'start_date',
        'end_date',
        'job_file',
        'return_job_file',
        'remark',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'job_name' => 'string',
        'job_details' => 'string',
        'payment' => 'string',
        'company_id' => 'integer',
        'student_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'job_file' => 'string',
        'return_job_file' => 'string',
        'remark' => 'string',
        'status' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function employer(){
        return $this->belongsTo(Employer::class, 'company_id', 'id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function requestjob(){
        return $this->hasOne(RequestJob::class, 'id', 'job_id');
    }

    public function companyrating(){
        return $this->hasOne(CompanyRating::class, 'id', 'job_id');
    }

    public function studentrating(){
        return $this->hasOne(StudentRating::class, 'id', 'job_id');
    }

}
