<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrants extends Model
{
    use HasFactory;
    protected $table = 'managers';
    public $timestamps = false;
}
