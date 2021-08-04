<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Occupants extends Model
{
    use HasFactory;
    protected $table = 'occupants';
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
