<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'pic_name',
        'company_name',
        'contact_number',
        'website_link',
        'ssm_number',
        'fields',
        'address',
        'description',
        'company_logo',
        'company_ssm',
        'password',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'pic_name' => 'string',
        'company_name' => 'string',
        'contact_number' => 'string',
        'website_link' => 'string',
        'ssm_number' => 'string',
        'fields' => 'string',
        'address' => 'string',
        'description' => 'string',
        'company_logo' => 'string',
        'company_ssm' => 'string',
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
        return $this->hasMany(Job::class, 'id', 'company_id');
    }

    public function chats(){
        return $this->hasMany(Chat::class, 'id', 'company_id');
    }


}
