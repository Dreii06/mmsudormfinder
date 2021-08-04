<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Dorms extends Model
{
    use HasFactory;
    protected $table = 'dorm';
    public $timestamps = false;

    protected $fillable = [
        'owner_name',
        'dorm_name',
        'contact_num',
        'filename'
    ];
}
