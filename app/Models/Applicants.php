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
        'name',
        'email',
        'stud_number',
        'sex',
        'mobile_number',
        'guardian_number',
        'date_of_birth',
        'address',
        'college',
        'course',
    ];
}
