<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance'; 
    protected $fillable = [
        'employee_id', // Add 'employee_id' to the fillable array
        'date',
        'status',
    ];
}
