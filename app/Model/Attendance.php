<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['id', 'attendance', 'allergies', 'important_point', 'message'];
}
