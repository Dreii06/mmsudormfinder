<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Applicants extends Model
{
    use HasFactory;
    protected $table = 'applicants';
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'email',
        'stud_num',
        'sex',
        'mobile_num',
        'guardian_name',
        'guardian_num',
        'barangay',
        'street',
        'city',
        'province',
        'college',
        'course',
        'dormitory',
        'room_type',
    ];
}
