<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnCampusDorms extends Model
{
    use HasFactory;
    protected $table = 'oncampusdorms';
    public $timestamps = false;
    protected $fillable = [
        'dormitory'
    ];
}
