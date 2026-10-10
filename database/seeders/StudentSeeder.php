<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'student_name' => 'John Doe',
            'gender' => 'Male',
            'dob' => '2001-05-15',
            'enrollment' => 'STU-2024-001',
            'enrollment_date' => '2023-09-01',
            'description' => 'Top academic score',
            'dept_id' => 1 
        ]);
    }
}
