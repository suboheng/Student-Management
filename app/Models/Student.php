<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'student_id'; 

    protected $fillable = [
        'student_name',
        'dob',
        'gender',
        'enrollment_date',
        'enrollment',
        'dept_id',
        'avg', 
        'description',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'dept_id');
    }
}