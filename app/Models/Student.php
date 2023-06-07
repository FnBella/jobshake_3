<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'full_name',
        'email',
        'nationality',
        'ic_passport',
        'gender',
        'contact',
        'university',
        'course',
        'semester',
        'cgpa',
        'fields',
        'skills',
        'description',
        'profile_pic',
        'student_card',
        'password',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'full_name' => 'string',
        'email' => 'string',
        'nationality' => 'string',
        'ic_passport' => 'string',
        'gender' => 'string',
        'contact' => 'string',
        'university' => 'string',
        'course' => 'string',
        'semester' => 'string',
        'cgpa' => 'float',
        'fields' => 'string',
        'skills' => 'string',
        'description' => 'string',
        'profile_pic' => 'string',
        'student_card' => 'string',
        'password' => 'string',
        'status' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'profile_id');
    }


    public function jobs(){
        return $this->hasMany(Job::class, 'id', 'student_id');
    }

    public function chats(){
        return $this->hasMany(Chat::class, 'id', 'student_id');
    }

}
