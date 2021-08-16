<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffCampusDorms extends Model
{
    use HasFactory;
    protected $table = 'offcampusdorms';
    public $timestamps = false;
    protected $fillable = [
        'dormitory'
    ];
}
